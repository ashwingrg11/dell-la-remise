<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use App\Mail\UserCreated;
use App\Mail\UserDeleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Generate Ramdom Password
     *
     * @return string
     */
    public function addPassword()
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        return $password;
    }

    /**
     * Show user create form
     *
     * @return view
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Display User's list
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        if ($request->ajax())
            return $users = $this->user->listUser();
        return view('user.list');
    }

    /**
     * Store the newly created user
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|regex: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/'
        ], [
            'fullname.required' => 'The name field is required.',
            'email.unique' => 'A user already exists for given email.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password = $this->addPassword();
        $data = $request;
        $data['password'] = bcrypt($password);
        $data['role'] = 'admin';
        DB::beginTransaction();
        try {
            $created = $this->user->saveUser($data);
            if($created){
                $mail = new UserCreated($data['email'], $password, $data);
                Mail::to($data['email'])->send($mail);
                DB::commit();
                return redirect('users')->with('message', 'User Successfully created');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('users')->with('error-message', 'Oops!Something went wrong. Please try again later. ');
        }
    }

    /**
     * Display the view to edit the user details
     *
     * @param integer $id
     * @return view
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        return view('user.create')->with('user', $user);
    }

    /**
     * Update the user's detail
     *
     * @param integer $id
     * @param Request $request
     * @return Respose
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|regex: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
        ], [
            'fullname.required' => 'The name field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->user->findOrFail($id);
        DB::beginTransaction();
        try {
            $user->updateUser($request);
            DB::commit();
            return redirect('users')->with('message', 'User SuccessFully Updated');
        } catch (\Exception $e){
            DB::rollback();
            return redirect('users')->with('error-message', 'Oops!Something went wrong. Please try again later. ');
        }
    }

    /**
     * Delete the user 
     *
     * @param integer $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        DB::beginTransaction();
        try {
            $delete = $user->delete();
            if($delete){
                $mail = new UserDeleted($user);
                Mail::to($user['email'])->send($mail);
                DB::commit();
                return redirect('users')->with('message', 'User SuccessFully Deleted');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('users')->with('error-message', 'Oops!Something went wrong. Please try again later. ');
        }
    }

    /**
     * Php Mailer function 
     *
     * @param [type] $data
     * @param [type] $password
     * @return void
     */
    public function sendUserCreatedEmail($data, $password)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPKeepAlive = true;
            $mail->Mailer = env('MAIL_DRIVER', 'smtp');

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->SMTPAutoTLS = false;
            $mail->Host = env('MAIL_HOST');
            $mail->Port = env('MAIL_PORT');
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');

            $mail->setFrom('imniraj555@gmail.com');

            $mail->addAddress($data->email);

            $mail->isHTML(true);
            $mail->Subject = 'Your acount has been created';
            $body = view('emails.usercreated', compact('data', 'password'));
            $mail->Body = $body;
            return $mail->send();
        } catch (\Exception $e) {
            return false;
            echo $e->getMessage();
        }
    }
}

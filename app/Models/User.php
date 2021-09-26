<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\DataTables;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole($user)
    {
        return $this->select('role')->where('id', $user)->get();
    }

    public function saveUser($data)
    {
        return $this->create([
            'name' => $data->fullname,
            'email' => $data->email,
            'password' => $data->password,
            'role' => $data->role
        ]);
    }

    public function listUser()
    {
        $query = $this->select('users.name', 'users.email', 'users.status as user_status', 'users.id as user_id','users.created_at')->where('users.role', 'admin');
        return DataTables::of($query)
            ->editColumn('user_status', function ($query) {
                if ($query->user_status == '1') {
                    return 'Active';
                } else {
                    return 'InActive';
                }
            })
            ->editColumn('user_id', function ($query) {
                return '<a href="' . url('/users/edit/' . $query->user_id) . '">Edit</a> 
                        <a class="delete-user" href="#" data-url ="' . url('/users/delete/' . $query->user_id) . '" >Delete</a> ';
            })
            ->rawColumns([
                'user_status', 'user_id',
            ])
            ->make();
    }

    /**
     * Get the list of user's email having role admin
     *
     * @return object
     */
    public function getAdminEmails()
    {
        return $this->select('email')->where([
            ['role', 'admin'],
            ['status', 1]
        ])->get();
    }

    /**
     * Get user's name matching the id passed
     *
     * @param integer $id
     * @return Array
     */
    public function getUser($id){
        return $this->where('id',$id)->pluck('name')->toArray();
    }

    /**
     * Update user's details
     *
     * @param Request $request
     * @return object
     */
    public function updateUser($request){
        $this->name = $request->fullname;
        $this->email = $request->email;
        $this->status = $request->status;
        $this->save();
    }
}

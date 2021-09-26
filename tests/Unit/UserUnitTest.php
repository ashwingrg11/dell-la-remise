<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * User creation test
     * 
     * @return void
     */
    public function test_it_can_save_user(){
        $data =  [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'role' => 'super-admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];

        $data = (object)$data;
        $userModel = new User();
        $storeUser = $userModel->saveUser($data);

        $this->assertEquals($storeUser->name, $data->fullname);
        $this->assertEquals($storeUser->email, $data->email);
        $this->assertEquals($storeUser->role, $data->role);
        $this->assertEquals($storeUser->password, $data->password);
    }

    /**
     * List users test
     *
     * @return void
     */
    public function test_it_can_list_users(){

        $admin_users = factory(User::class,5)->create([
            'role' => 'admin'
        ]);
        $super_admin_users = factory(User::class,4)->create([
            'role' => 'super-admin'
        ]);

        $users_list = new User();
        $user_data = $users_list->listUser();

        $admin_users_list = $admin_users->pluck('email','name')->toArray();
        $users= json_decode($user_data->getContent())->data;

        $this->assertCount(5, $users);
        foreach ($users as $key => $user){
            $this->assertEquals(array_key_exists(htmlspecialchars_decode($user->name,ENT_QUOTES),$admin_users_list),true);
            $this->assertEquals(in_array($user->email,$admin_users_list),true);
        }
    }

    /**
     * list of user's email having role admin test 
     *
     * @return void
     */
    public function test_it_can_get_the_emails_having_role_admin_and_status_1()
    {
        $active_super_admin_users = factory(User::class,3)->create([
            'status' => 1
        ]);
       
        $active_admin_users = factory(User::class,2)->create([
            'role' => 'admin',
            'status' => 1
        ]);

        $inactive_super_admin_users = factory(User::class,3)->create([
            'status' => 0
        ]);
       
        $inactive_admin_users = factory(User::class,2)->create([
            'role' => 'admin',
            'status' => 0
        ]);

        $userModel = new User();
        $admin_emails = $userModel->getAdminEmails();
        $admin_emails =  $admin_emails->pluck('email')->toArray();
        $this->assertCount(2, $active_admin_users->all());

        $active_admin_users->each(function ($user) use ($admin_emails) {
            $this->assertEquals(in_array($user->email, $admin_emails),true);
        });
    }

    /**
     * Get user's name test
     *
     * @return void
     */
    public function test_it_can_get_the_user_name(){

        $user = factory(User::class)->create([
            'id' => 15,
            'name' => 'Dell Cashback',
            'email' => 'dellcashback@gmail.com',
            'status' => 1,
            'email_verified_at' => now(),
            'role' => 'super-admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $userModel = new User();
        $user_name = $userModel->getUser(15);
        $this->assertEquals($user->name, $user_name[0]);
    }

    /**
     * User data update test
     *
     * @return void
     */
    public function test_it_can_update_user(){
     
        $data =  [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'status' => 1,
        ];
        $data = (object)$data;

        $user = factory(User::class)->create();
        $user->updateUser($data);

        $this->assertEquals($user->name, $data->fullname);
        $this->assertEquals($user->email, $data->email);
        $this->assertEquals($user->status, $data->status);
    }
 
}

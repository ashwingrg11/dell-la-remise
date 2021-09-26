<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    protected $user;

    /**
     * Set up the test
     */
    public function setUp() :void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Test user create form view if logged in user is super admin
     */
    public function test_it_can_show_user_create_form_if_user_is_super_admin()
    {
        $response = $this->actingAs($this->user)->get(route('users.create'));
        $response->assertStatus(200);
        $response->assertViewIs('user.create');
    }

    /**
     * Test user create form view if logged in user is admin
     */
    public function test_it_cannot_show_user_create_form_if_user_is_admin()
    {

        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }

    /**
     * Test user create form view if user isnot logged in
     */
    public function test_it_cannot_show_user_create_form_if_user_isnot_logged_in()
    {
        $response = $this->get(route('users.create'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * Test user list view if logged in user is superadmin
     */
    public function test_it_can_list_the_available_users_if_logged_in_user_is_super_admin()
    {
        
        $response = $this->actingAs($this->user)->get(route('users.index'));
        $response->assertStatus(200);
        $response->assertViewIs('user.list');
    }

     /**
     * Test user list view if logged in user is admin
     */
    public function test_it_cannot_list_the_available_users_if_logged_in_user_is_admin()
    {
        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }

    /**
     * Test user creation function if logged in user is super admin
     *
     * @return void
     */
    public function test_it_can_create_user_if_logged_in_user_is_super_admin()
    {

        $data = [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];

        $response = $this->actingAs($this->user)->post(route('users.store'), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('message', 'User Successfully created');
    }

    /**
     * Test user creation function if logged in user is admin
     *
     * @return void
     */
    public function test_it_cannot_create_user_if_logged_in_user_is_admin()
    {

        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);
        $data = [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
        $response = $this->actingAs($user)->post(route('users.store'), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }

    /**
     * Test edit form view if logged in user is super admin
     *
     * @return void
     */
    public function test_it_can_show_edit_form_if_logged_in_user_is_super_admin(){
        
        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($this->user)->get(route('users.edit',$user->id));
        $response->assertStatus(200);
        $response->assertViewIs('user.create');
    }

    /**
     * Test edit form view if logged in user is admin
     *
     * @return void
     */
    public function test_it_can_show_edit_form_if_logged_in_user_is_admin(){
        
        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.edit',$user->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }

    /**
     * Test user update function if logged in user is super admin
     *
     * @return void
     */
    public function test_it_can_update_user_if_logged_in_user_is_super_admin()
    {

        $data = [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'status' => 1,
        ];
        $response = $this->actingAs($this->user)->put(route('users.update', $this->user->id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('message', 'User SuccessFully Updated');
    }

    /**
     * Test user update function
     *
     * @return void
     */
    public function test_it_cannot_update_user_if_logged_in_user_is_admin()
    {

        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);

        $data = [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'status' => 1,
        ];
        $response = $this->actingAs($user)->put(route('users.update', $user->id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }


    /**
     * Test user deletion
     *
     * @return void
     */
    public function test_it_can_delete_user_if_logged_in_user_is_super_admin(){

        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($this->user)->delete(route('users.delete', $user->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('message', 'User SuccessFully Deleted');
    }

    /**
     * Test user deletion
     *
     * @return void
     */
    public function test_it_cannot_delete_user_if_logged_in_user_is_admin(){

        $user = factory(User::class)->create([
            'role' => 'admin',
        ]);

        $delete_user = factory(User::class)->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->delete(route('users.delete', $delete_user->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
    }
}

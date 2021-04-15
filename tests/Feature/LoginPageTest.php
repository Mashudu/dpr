<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_the_login_form()
    {
        $user = User::factory()->create();

        $response =  $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_non_admin_user_cannot_access_admin_page()
    {
        $user = User::factory()->create();

        $response =  $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $this->get('/admin/users');

        $response->assertRedirect('/');
       
         
    }
    public function test_admin_user_can_access_admin_page()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('name', '=', 'admin')->first();
        $user->roles()->attach($adminRole->id);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response =  $this->get('/admin/users');

        $response->assertSeeText('Users');
       
      
    }
}

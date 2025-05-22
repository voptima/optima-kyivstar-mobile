<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login()
    {
        Admin::create(['surname'=>'a','name'=>'b','email'=>'admin@test','password'=>Hash::make('pass'),'active'=>true]);
        $response = $this->post('/admin/login', ['email' => 'admin@test', 'password' => 'pass']);
        $response->assertRedirect('/admin/users');
    }
}

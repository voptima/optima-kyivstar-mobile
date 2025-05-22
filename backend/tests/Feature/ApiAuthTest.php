<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ApiAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_flow()
    {
        $response = $this->postJson('/api/login', ['phone' => '111']);
        $response->assertStatus(200);
    }
}

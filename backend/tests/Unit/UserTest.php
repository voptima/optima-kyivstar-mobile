<?php
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_create_user()
    {
        $user = User::create([
            'surname' => 't',
            'name' => 't',
            'patronymic' => '',
            'phone' => '1234567',
            'class' => 'A',
            'session_expires_at' => now()->addYear(),
            'active' => true,
        ]);
        $this->assertNotNull($user->id);
    }
}

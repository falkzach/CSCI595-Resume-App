<?php

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class AccountTest extends TestCase
{
    public function testGetUser()
    {
        $userData = Auth::user()->toArray();
        $this->json('GET', '/api/account')
            ->seeJson($userData);
    }

    public function testUpdateUser()
    {
        $userData = Auth::user()->toArray();
        $data = [
            'name' => 'Not Bob Saget',
            'email' => 'ohnotbobsaget@test.com',
            'phone' => '406-555-1212',
            'address' => '123 Fake st Missoula, MT 59801'
        ];

        $this->json('POST', '/api/account/update', $data)
            ->seeJson($data);
    }

    public function testChangePassword()
    {
        $data= [
            'currentPassword' => 'password123',
            'newPassword' => 'newPassword123',
            'confirmPassword' => 'newPassword123',
        ];

        $this->json('POST', '/api/account/changePassword', $data)
            ->seeJson(['name' => 'Bob Saget', 'email' => 'ohbobsaget@test.com']);
    }

    public function testChanagePasswordWrongCurrent()
    {
        $data= [
            'currentPassword' => 'wrongPassword123',
            'newPassword' => 'newPassword123',
            'confirmPassword' => 'newPassword123',
        ];

        $this->json('POST', '/api/account/changePassword', $data)
            ->seeJson(['status' => 'error', 'message' => 'Incorrect Password!'], 500);
    }

    public function testChanagePasswordMismatch()
    {
        $data= [
            'currentPassword' => 'password123',
            'newPassword' => 'newPassword123',
            'confirmPassword' => 'mismatchPassword123',
        ];

        $this->json('POST', '/api/account/changePassword', $data)
            ->seeJson(['status' => 'error', 'message' => 'Passwords did not match!'], 500);
    }
}

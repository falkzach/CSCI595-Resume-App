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
            'email' => 'ohnotbobsagget@test.com',
            'phone' => '406-555-1212',
            'address' => '123 Fake st Missoula, MT 59801'
        ];

        $this->json('POST', '/api/account/update', $data)
            ->seeJson($data);
    }

    public function testChangePassword()
    {

    }

    public function testDeactivateAccount()
    {

    }

}

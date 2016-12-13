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
            'password' => 'newpassword123',
        ];

        $this->json('POST', '/api/account/update')
            ->seeJson($data);
    }

}

<?php

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class ContactTest extends TestCase
{
    public function testAddComment()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'subject' => 'suggestiong',
            'comment' => 'do something cool with the app!',
        ];

        $this->json('POST', '/api/contact/add', $data)
            ->seeJson($data);
    }
}

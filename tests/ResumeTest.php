<?php

use App\Resume;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResumeTest extends TestCase
{
    public function testGetResume()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];

        Resume::create($resumeData);


    }

    public function testCreateResume()
    {
        $this->visit('/')
            ->see('ResuME');
    }
}

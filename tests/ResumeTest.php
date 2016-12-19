<?php

use App\Resume;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResumeTest extends TestCase
{
    public function testGetResumes()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        Resume::create($resumeData);

        $this->json('GET', '/api/resume')
            ->seeJson($resumeData);
    }

    public function testGetResume()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);

        $this->json('GET', "/api/resume/$resume->id")
            ->seeJson($resumeData);
    }

    public function testCreateResume()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $this->json('POST', '/api/resume/create', $resumeData)
            ->seeJson($resumeData);
    }

    public function testUpdateResume()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);

        $data = [
            'user_id' => "$user->id",
            'name' => 'My Not First Resume',
            'description' => 'the is a different resume!',
        ];

        $this->json('POST', "/api/resume/$resume->id/update", $data)
            ->seeJson($data);
    }

    public function testDeleteResume()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $this->assertCount(1, Resume::all());

        $response = $this->call('DELETE', "/api/resume/$resume->id/delete", []);
        $this->assertCount(0, Resume::all());
    }
}

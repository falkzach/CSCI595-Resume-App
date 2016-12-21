<?php

use App\Reference;
use App\Resume;
use App\School;
use App\Skill;
use App\Work;
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

    public function testAddSchool()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        $school = School::create($schoolData);

        $this->assertCount(0, $resume->schools);

        $this->call('POST', "/api/resume/$resume->id/school/$school->id/add", []);
        $resume = Resume::find($resume->id);

        $this->assertCount(1, $resume->schools);
    }

    public function testRemoveSchool()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        $school = School::create($schoolData);
        $resume->schools()->attach($school->id);

        $resume = Resume::find($resume->id);
        $this->assertCount(1, $resume->schools);

        $this->call('POST', "/api/resume/$resume->id/school/$school->id/remove", []);

        $resume = Resume::find($resume->id);
        $this->assertCount(0, $resume->schools);
    }

    public function testAddWork()
{
    $user = Auth::user();
    $resumeData = [
        'user_id' => "$user->id",
        'name' => 'My First Resume',
        'description' => 'the first resume ever!',
    ];
    $resume = Resume::create($resumeData);
    $workData = [
        'user_id' => "$user->id",
        'employer' => 'My Old Workplace',
        'start_date' => '2010-05-01',
        'end_date' => '2015-05-01',
        'description' => 'I did work and stuff'
    ];
    $work = Work::create($workData);

    $this->assertCount(0, $resume->jobs);

    $this->call('POST', "/api/resume/$resume->id/work/$work->id/add", []);
    $resume = Resume::find($resume->id);

    $this->assertCount(1, $resume->jobs);
}

    public function testRemoveWork()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $workData = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2015-05-01',
            'description' => 'I did work and stuff'
        ];
        $work = Work::create($workData);
        $resume->jobs()->attach($work->id);

        $resume = Resume::find($resume->id);
        $this->assertCount(1, $resume->jobs);

        $this->call('POST', "/api/resume/$resume->id/work/$work->id/remove", []);

        $resume = Resume::find($resume->id);
        $this->assertCount(0, $resume->jobs);
    }

    public function testAddSkill()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!'
        ];
        $skill = Skill::create($skillData);

        $this->assertCount(0, $resume->skills);

        $this->call('POST', "/api/resume/$resume->id/skill/$skill->id/add", []);
        $resume = Resume::find($resume->id);

        $this->assertCount(1, $resume->skills);
    }

    public function testRemoveSkill()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!'
        ];
        $skill = Skill::create($skillData);
        $resume->skills()->attach($skill->id);

        $resume = Resume::find($resume->id);
        $this->assertCount(1, $resume->skills);

        $this->call('POST', "/api/resume/$resume->id/skill/$skill->id/remove", []);

        $resume = Resume::find($resume->id);
        $this->assertCount(0, $resume->skills);
    }

    public function testAddReference()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $referenceData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];
        $reference = Reference::create($referenceData);

        $this->assertCount(0, $resume->references);

        $this->call('POST', "/api/resume/$resume->id/reference/$reference->id/add", []);
        $resume = Resume::find($resume->id);

        $this->assertCount(1, $resume->references);
    }

    public function testRemoveReference()
    {
        $user = Auth::user();
        $resumeData = [
            'user_id' => "$user->id",
            'name' => 'My First Resume',
            'description' => 'the first resume ever!',
        ];
        $resume = Resume::create($resumeData);
        $referenceData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];
        $reference = Reference::create($referenceData);
        $resume->references()->attach($reference->id);

        $resume = Resume::find($resume->id);
        $this->assertCount(1, $resume->references);

        $this->call('POST', "/api/resume/$resume->id/reference/$reference->id/remove", []);

        $resume = Resume::find($resume->id);
        $this->assertCount(0, $resume->references);
    }
}

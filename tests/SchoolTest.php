<?php

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class SchoolTest extends TestCase
{
    public function testGetSchools()
    {
        $user = Auth::user();
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => "1",
            'graduation_date' => '2018-05-01',
            'gpa' => "4.0"
        ];
        School::create($schoolData);
        $this->json('GET', '/api/school')
            ->seeJson($schoolData);
    }

    public function testCreateSchool()
    {
        $user = Auth::user();
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        $this->json('POST', '/api/school/create', $schoolData)
            ->seeJson($schoolData);
    }

    public function testDeleteSchool()
    {
        $user = Auth::user();
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        $school = School::create($schoolData);
        $this->assertCount(1, School::all());

        $response = $this->call('DELETE', "/api/school/$school->id/delete", []);
        $this->assertCount(0, School::all());
    }

    public function testUpdateSchool()
    {
        $user = Auth::user();
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        $school = School::create($schoolData);

        $data = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2020-05-01',
            'gpa' => '3.9'
        ];

        $this->json('POST', "/api/school/$school->id/update", $data)
            ->seeJson($data);
    }
}

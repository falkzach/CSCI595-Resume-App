<?php

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class SchoolTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetSchools()
    {
        $user = Auth::user();
        $schoolData = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
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

        $data = [
            'id' => $school->id,
        ];

        $response = $this->call('DELETE', '/api/school/delete', $data);
        $this->assertCount(0, School::all());
    }
}

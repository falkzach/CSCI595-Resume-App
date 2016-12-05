<?php

use App\Work;
use Illuminate\Support\Facades\Auth;

class WorkTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetSchools()
    {
        $user = Auth::user();
        $workData = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2015-05-01',
            'description' => 'I did work and stuff'
        ];
        Work::create($workData);
        $this->json('GET', '/api/work')
            ->seeJson($workData);
    }

//    public function testCreateSchool()
//    {
//        $user = Auth::user();
//        $workData = [
//            'user_id' => "$user->id",
//            'institution' => 'UMT',
//            'enrolled' => '1',
//            'graduation_date' => '2018-05-01',
//            'gpa' => '4.0'
//        ];
//        $this->json('POST', '/api/school/create', $workData)
//            ->seeJson($workData);
//    }
//
//    public function testDeleteSchool()
//    {
//        $user = Auth::user();
//        $workData = [
//            'user_id' => "$user->id",
//            'institution' => 'UMT',
//            'enrolled' => '1',
//            'graduation_date' => '2018-05-01',
//            'gpa' => '4.0'
//        ];
//        $school = School::create($workData);
//        $this->assertCount(1, School::all());
//
//        $data = [
//            'id' => $school->id,
//        ];
//
//        $response = $this->call('DELETE', '/api/school/delete', $data);
//        $this->assertCount(0, School::all());
//    }
}

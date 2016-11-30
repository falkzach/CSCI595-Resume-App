<?php

use App\School;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
        $data = [
            'user_id' => "$user->id",
            'institution' => 'UMT',
            'enrolled' => '1',
            'graduation_date' => '2018-05-01',
            'gpa' => '4.0'
        ];
        School::create($data);
        $this->json('GET', '/api/school')
            ->seeJson($data);
    }
}

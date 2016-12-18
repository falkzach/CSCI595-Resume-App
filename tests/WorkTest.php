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
    public function testGetWork()
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

    public function testCreateWork()
    {
        $user = Auth::user();
        $workData = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2015-05-01',
            'description' => 'I did work and stuff'
        ];
        $this->json('POST', '/api/work/create', $workData)
            ->seeJson($workData);
    }

    public function testDeleteWork()
    {
        $user = Auth::user();
        $workData = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2015-05-01',
            'description' => 'I did work and stuff'
        ];
        $work = Work::create($workData);
        $this->assertCount(1, Work::all());

        $response = $this->call('DELETE', "/api/work/delete/$work->id");
        $this->assertCount(0, Work::all());
    }

    public function testUpdateWork()
    {
        $user = Auth::user();
        $workData = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2015-05-01',
            'description' => 'I did work and stuff'
        ];
        $work = Work::create($workData);

        $data = [
            'user_id' => "$user->id",
            'employer' => 'My Old Workplace',
            'start_date' => '2010-05-01',
            'end_date' => '2011-05-01',
            'description' => 'I did nothing and got payed'
        ];

        $this->json('POST', "/api/work/update/$work->id", $data)
            ->seeJson($data);
    }
}

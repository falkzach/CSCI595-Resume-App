<?php

use App\Reference;
use Illuminate\Support\Facades\Auth;

class ReferenceTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetReference()
    {
        $user = Auth::user();
        $referenceData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',

        ];
        Reference::create($referenceData);
        $this->json('GET', '/api/reference')
            ->seeJson($referenceData);
    }

    public function testCreateReference()
    {
        $user = Auth::user();
        $referenceData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];
        $this->json('POST', '/api/reference/create', $referenceData)
            ->seeJson($referenceData);
    }

    public function testDeleteWork()
    {
        $user = Auth::user();
        $referenceData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];
        $reference = Reference::create($referenceData);
        $this->assertCount(1, Reference::all());

        $response = $this->call('DELETE', "/api/reference/$reference->id/delete");
        $this->assertCount(0, Reference::all());
    }

    public function testUpdateReference()
    {
        $user = Auth::user();
        $workData = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];
        $reference = Reference::create($workData);

        $data = [
            'user_id' => "$user->id",
            'name' => 'Michael Cassens',
            'email' => 'Michael.Cassens@umontana.edu',
            'phone' => '406-555-1212',
        ];

        $this->json('POST', "/api/reference/$reference->id/update", $data)
            ->seeJson($data);
    }
}

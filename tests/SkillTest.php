<?php

use App\Skill;
use Illuminate\Support\Facades\Auth;

class SkillTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetSkill()
    {
        $user = Auth::user();
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!',

        ];
        Skill::create($skillData);
        $this->json('GET', '/api/skill')
            ->seeJson($skillData);
    }

    public function testCreateSkill()
    {
        $user = Auth::user();
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!'
        ];
        $this->json('POST', '/api/skill/create', $skillData)
            ->seeJson($skillData);
    }

    public function testDeleteWork()
    {
        $user = Auth::user();
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!'
        ];
        $skill = Skill::create($skillData);
        $this->assertCount(1, Skill::all());

        $response = $this->call('DELETE', "/api/skill/$skill->id/delete");
        $this->assertCount(0, Skill::all());
    }

    public function testUpdateSkill()
    {
        $user = Auth::user();
        $skillData = [
            'user_id' => "$user->id",
            'name' => 'Nunchucks Skills!'
        ];
        $skill = Skill::create($skillData);

        $data = [
            'user_id' => "$user->id",
            'name' => 'Bowhunting Skills!'
        ];

        $this->json('POST', "/api/skill/$skill->id/update", $data)
            ->seeJson($data);
    }
}

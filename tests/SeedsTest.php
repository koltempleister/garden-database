<?php


class SeedsTest extends TestCase
{
    public function testController()
    {
        $this->visit('seeds')->assertResponseOk();
        $this->visit('seeds/create')->assertResponseOk();
        $this->makeRequest(
            'POST',
            'seeds',
            [
                'name' => 'test',
                'parent_id' => '0'
            ])->assertResponseOk();

    }


}
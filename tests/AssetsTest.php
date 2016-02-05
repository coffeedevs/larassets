<?php

class AssetsTest extends TestCase
{
    public function testAssetApply()
    {
        $this->visit('/')
            ->type('<link rel="stylesheet" href="/build/css/app-958975778f.css">', 'string')
            ->press('Submit')
            ->assertResponseOk();
    }
}

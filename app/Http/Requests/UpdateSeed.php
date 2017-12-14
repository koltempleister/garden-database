<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSeed extends CreateSeed
{

    public function persist()
    {
        $this->route('seed')->update($this->all());

    }
}

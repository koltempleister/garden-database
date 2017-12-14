<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSpecies extends CreateSpecies
{

    public function persist()
    {
        $this->route('species')->update($this->all());
    }
}

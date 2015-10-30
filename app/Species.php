<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model {

	public function seeds()
        {
            return $this->hasMany('App\Seeds');
        }

}

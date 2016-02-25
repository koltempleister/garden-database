<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

	public function sowings()
	{
		return $this->hasMany('App\Sowing');
	} 

}

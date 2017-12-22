<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model {

    use SoftDeletes;

	public function sowings()
	{
		return $this->hasMany('App\Sowing');
	} 

}

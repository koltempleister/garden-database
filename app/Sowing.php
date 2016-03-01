<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sowing extends Model {

	 protected $fillable = [
        'stock_item_id',
        'place_id',
        'sow_date', 
        'harvest_date',
        'year',
    ];
	
    public $timestamps = false;
	
	public function place()
	{
		return $this->belongsTo('App\Place');
	}

	public function stock_item()
	{
		return $this->belongsTo('App\Stock_item'); 		
	}  

	public function seed()
	{
		return $this->belongsTo('App\Seed');
	}
}

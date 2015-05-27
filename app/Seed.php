<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model {

    protected $fillable = [
        'name',
        'remarks'
    ];
    
    public function stock_items()
    {
        return $this->hasMany('App\Stock_item');
    }
}

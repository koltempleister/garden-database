<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_item extends Model {

    public function seed()
    {
        return $this->belongsTo('\App\Seed');
    }//

}

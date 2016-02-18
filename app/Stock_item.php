<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_item extends Model {

    protected $fillable = [
        'seed_id',
        'supplier_id',
        'fresh_untill', 
        'date_of_purchase',
        'status',
    ];

    private static $statuses = [
        'in voorraad' => 'available',
        'niet meer in voorraad' => 'unavailable',
        'besteld' => 'ordered',
    ];

    public $timestamps = false;

    public function seed()
    {
        return $this->belongsTo('\App\Seed');
    }

    public function supplier()
    {
        return $this->belongsTo('\App\Supplier');
    }

    /*
       avalailable statuses 
        @param $status_value 
        @return key or array
    */
    public static function statuses($status_value = null)
    {
        // dd($status_value);
        return is_null($status_value) ? self::$statuses : array_search($status_value, self::$statuses);
    }

}

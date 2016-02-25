<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_item extends Model {

    const AVAILABLE = 'in voorraad';    
    const UNAVAILABLE = 'niet meer in voorraad';    
    const ORDERED = 'besteld';    
    
    protected $fillable = [
        'seed_id',
        'supplier_id',
        'fresh_untill', 
        'date_of_purchase',
        'status',
    ];

    private static $statuses = [
        self :: AVAILABLE => 'available',
        self :: UNAVAILABLE => 'unavailable',
        self :: ORDERED => 'ordered',
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

    public function sowing()
    {
            return $this->hasMany('App\Sowing');
    } 

    /**
    * avalailable statuses 
    * @param $status_value 
    * @return key or array
    */
    public static function statuses()
    {
        // dd($status_value);
        return self::$statuses;
    }

    /**
    * get list list of available stock items
    * 
    * @return array
    */
    public static function available()
    {
        $stock_items = Stock_item :: where('status', '=', Stock_item :: AVAILABLE)->get();

        $stock_items_list = [];
        foreach($stock_items as $stock_item)
        {
            $stock_items_list[$stock_item->id] = $stock_item->seed->name . ' - ' . $stock_item->supplier->name . ' - ' . $stock_item->fresh_untill;
        }
        return $stock_items_list;
    } 

}

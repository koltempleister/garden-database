<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model {

    protected $fillable = [
        'name',
        'remarks',
        'species_id', 
        'outside_from',
        'outside_till',
        'inside_from',
        'inside_till',
        'harvest_from',
        'harvest_till',
        'time_till_harvest',
        'row_distance_cm',
        'thin_out_cm',
        'replant_possible',
        'plant_out_from',
        'plant_out_till'
    ];

    public $timestamps = false;

    protected $with = ['species'];

    public function stock_items()
    {
        return $this->hasMany('App\Stock_item');
    }
    
    public function species()
    {
        return $this->belongsTo('App\Species');
    }
    
    public function sowings()
    {
        return $this->hasMany('App\Sowing');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * 
     * return an array of species ids
     * 
     * @return array
     */
    public function getSpeciesListAttribute()
    {
        return $this->species()->pluck('id');
    }

    public function getOutsideFromAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }

    public function getOutsideTillAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }
    
    public function getInsideFromAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }

    public function getInsideTillAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }
    
    public function getHarvestFromAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }

    public function getHarvestTillAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }
    
    public function getPlantOutFromAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }

    public function getPlantOutTillAttribute($value)
    {
        return array('value' => $value , 'formatted' => is_null($value) ? 'nvt' : self::sowingPeriods()[$value]);
    }
    
    /**
     * returns an array of sowing periods
     * 
     * @return array
     */
    public static function sowingPeriods()
    {
        $month = 1;

        $periods[] = 'nvt';

        while($month < 13)
        {
            $month_name = date('F', mktime(0,0,0,$month));
            $periods[SowingPeriod::full_month($month)->as_string()]                   = $month_name;
            $periods[SowingPeriod::beginning_of($month)->as_string()] = 'Beginning of ' . $month_name;
            $periods[SowingPeriod::half_of($month)->as_string()]      = 'Half of ' . $month_name;
            $periods[SowingPeriod::end_of($month)->as_string()]       = 'End of ' . $month_name;
            $month++;
        }    
        return $periods;
    }
    
    public function getSowingPeriodsListAttribute()
    {
        return array_keys(self ::sowingPeriods());
    }

    public function scopeCanSowThisMonth($query, $month)
    {
        return $query->where('outside_from' , '<=' , $month)->where('outside_till', '>=', $month );
    }

    public function scopeUnavailable($query)
    {
        return $query->whereHas('stock_items',function($query){
            $query->where('status', '=','in voorraad')->where('fresh_untill' ,'>=', date('Y'));
        },'=', 0);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name','LIKE', '%'. $search .'%');
    }

    public function scopeFilterSpecies($query, $species_id)
    {
        return $query->where('species_id' , $species_id);

    }
}

class SowingPeriod
{
    private $month;
    
    private function __construct($month)
    {
        $this->month = $month;
    }
    
    public static function full_month($month)
    {
        return new static($month);
    }
    
    public static function beginning_of($month)
    {
        return new static($month  + 0.1);
    }
    
    public static function half_of($month)
    {
        return new static($month + 0.5);
    }
    
    public static function end_of($month)
    {
        return new static($month + 0.9);
    }
    
    public function as_string()
    {
        return (string) $this->month;
    }

    
}

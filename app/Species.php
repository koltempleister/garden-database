<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Species extends Model {

    use NodeTrait;

    public $timestamps = false;

	public $fillable = [
		'name',
		'parent_id'
	];

	public function seeds()
    {
        return $this->hasMany('App\Seeds');
    }

  
    /**
     * builds array with hierachical tree
     * 
     * @return array
    */
    public static function tree()
    {
    	$species = self :: all();
    	$self = new Species();

    	$self->buildTree(0, $species);
    }

    /**
     * recursive array builder
     * 
     * @param int $id
     * @param array $array (flat) with models
     * @return $array
    */
    private function buildTree($id, $array)
    {
    	$resultarray = array();
    	foreach ($array as $key => $model) {
    			
    		if($model->parent_id == $id)
    		{
				$resultarray['children'][] = $this->buildTree($model->id, $array);
    		}
    		if($model->id == $id)
    		{
    			$resultarray['name'] = $model->name;
    			$resultarray['id'] = $model->id;
    			unset($array[$key]);
    		}
    	}
    	return $resultarray;	
    }

	/**
	 * @return array
	 */
	public static function parentsTreeArray()
	{
		$species_tree = self::get()->toTree();

		$traverse = function ($categories, $prefix = '-') use (&$traverse) {
			$out = [];
			foreach ($categories as $category) {
				$out[$category->id] = PHP_EOL.$prefix.' '.$category->name;

				$out = array_merge($out, $traverse($category->children, $prefix.'-'));
			}
			return $out;
		};

		$parents[0] = 'root';

		return array_merge($parents, $traverse($species_tree));
	}
}

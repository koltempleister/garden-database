<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Species extends Model {

    use NodeTrait;

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

}

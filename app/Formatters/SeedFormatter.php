<?php
/**
 * Created by PhpStorm.
 * User: jevdheyd
 * Date: 22/12/17
 * Time: 15:59
 */

class SeedFormatter
{
    protected $seed;

    public function __construct(\App\Seed $seed)
    {
        $this->seed = $seed;

    }

    public function format()
    {
        return $this->seed;

    }
}
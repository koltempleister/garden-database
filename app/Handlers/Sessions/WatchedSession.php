<?php

namespace App\Handler\Session;

/**
 * Class WatchedSession
 * @package App\Handler\Session
 */
class WatchedSession
{
    protected $name;
    protected $watch;
    protected $value;

    /**
     * WatchedSession constructor.
     * @param $name
     * @param $watch
     * @param $value
     */
    public function __construct($name, $watch, $value)
    {
        $this->name = $name;
        $this->watch = $watch;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $name;
    }

    /**
     * @return bool
     */
    public function watch()
    {
        return $watch;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $value;
    }
}}
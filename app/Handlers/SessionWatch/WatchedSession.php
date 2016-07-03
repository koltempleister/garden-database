<?php

namespace App\Handlers\SessionWatch;

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
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function watch()
    {
        return $this->watch;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }
}
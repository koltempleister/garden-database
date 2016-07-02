<?php
namespace App\Handler\Session

use \Session;

/**
 * more specific session management
 * Class SessionHandler
 * @package App\Handler\Session
 */
class SessionHandler
{
    /**
     * commits a variable to session when criterium is true
     * otherwise destroys session
     *
     * @param $variable
     * @param $value
     * @param $criterium
     */
    public static function handleVar($variable, $value, $criterium)
    {
        if($criterium)
        {
            Session::put($variable, $value);
        }
        else
        {
            Session::forget($var);
        }
    }
}
<?php

namespace App\Handler\Session

use \Session;

/**
 * more specific session management
 * Class SessionHandler
 * @package App\Handler\Session
 */
class SessionWatcher
{
    protected $watched;
    protected $atLeastOne = false;

    /**
     * @param WatchedSession $watched_session
     */
    public function watch(WatchedSession $watched_session)
    {
        $this->watched[$watched_session->name()] = $watched_session;
        $this->handleVar($watched_session->name());
        if($watched_session->watch()) $this->atLeastOne = true;
    }

    /**
     * commits a variable to session when criterium is true
     * otherwise destroys session
     *
     * @param $name
     */
    protected function handleVar($name)
    {
        $item = $this->name;

        if ($item->watch()) {
            Session::put($item->name(), $item->name());
        } else {
            Session::forget($this->name());
        }
    }

    /**
     * returns if at least one the watched session vars is registered
     *
     * @return bool
     */
    public function watchedSessionIsRegistered()
    {
        return $this->atLeastOne;
    }
}


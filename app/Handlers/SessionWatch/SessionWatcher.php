<?php

namespace App\Handlers\SessionWatch;

use \Session;

/**
 * more specific session management
 * Class SessionHandler
 * @package App\Handler\Session
 */
class SessionWatcher
{
    protected $variables;
    protected $atLeastOne = false;

    /**
     * @param WatchedSession $watched_session
     */
    public function watch(WatchedSession $watched_session)
    {
        $this->variables[$watched_session->name()] = $watched_session;
        $this->handleVar($watched_session);
        if($watched_session->watch()) $this->atLeastOne = true;
    }

    /**
     * commits a variable to session when criterium is true
     * otherwise destroys session
     *
     * @param $name
     */
    protected function handleVar($watched_session)
    {
        if ($watched_session->watch()) {
            Session::put($watched_session->name(), $watched_session->value());
        } else {
            Session::forget($watched_session->name());
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

    /**
     * returns all watched vars
     *
     * @param bool $boolean
     * @return array
     */
    public function watched($boolean = true)
    {
        $filtered = [];

        foreach ($this->variables as $item) {
            if($item->watch() == $boolean) $filtered[] = $item;
        }

        return $filtered;
    }

    /**
     * returns all unwatched vars
     *
     * @return array
     */
    public function unwatched()
    {
        return $this->watched(false);
    }

    public function variables()
    {
        return $this->variables;
    }
}


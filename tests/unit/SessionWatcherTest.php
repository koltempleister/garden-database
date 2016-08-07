<?php



class SessionWatcherTest extends TestCase {

    /**
     * checks session watch activity
     */
    public function testSessionBeingWatched()
    {
        $watcher = new \App\Handlers\SessionWatch\SessionWatcher();

        $watcher->watch(new \App\Handlers\SessionWatch\WatchedSession('test2', false, 'test'));

        $this->assertEmpty(Session::get('test2'));

        $this->assertFalse($watcher->watchedSessionIsRegistered());

        $watcher->watch(new \App\Handlers\SessionWatch\WatchedSession('test', true, 'test'));

        $this->assertNotEmpty(Session::get('test'));

        $this->assertTrue($watcher->watchedSessionIsRegistered());
        
        $this->assertCount(2, $watcher->variables());

        $this->assertCount(1, $watcher->watched());
        $this->assertCount(1, $watcher->unwatched());
    }
}
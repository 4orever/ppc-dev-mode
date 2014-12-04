<?php
namespace PpcDevMode;

use Composer\Script\Event;

class ComposerScripts {
    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();
        echo "post update event!";
        // do stuff
    }
    public static function postInstall(Event $event)
    {
        $composer = $event->getComposer();
        // do stuff
    }

    public static function test()
    {
        echo 'test';
    }
}
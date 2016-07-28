<?php

namespace OpenWebAddict\SocialStream;

/**
 * SocialStream is the main API entry point.
 *
 * Add configured social network apps to it and just read stream!
 *
 * @package OpenWebAddict\SocialStream
 */
class SocialStream
{
    private static $instance = null;

    protected $apps = [];

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    public function addSocialNetworkApp(SocialNetworkApp $app)
    {
        $this->apps[] = $app;
    }

    public function getStream()
    {
        $items = [];

        foreach ($this->apps as $app) {
            $streamItems = $app->getReader()->getStream();
            foreach ($streamItems as $st) {
                $items[] = $st;
            }
        }

        usort($items, [$this, 'sortItems']);

        return $items;
    }

    public function sortItems($a, $b)
    {
        $dateA = new \DateTime($a['published_time']);
        $dateB = new \DateTime($b['published_time']);
        if ($dateA == $dateB) {
            return 0;
        }
        return ($dateA > $dateB) ? 1 : -1;
    }
}

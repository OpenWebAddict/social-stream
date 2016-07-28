<?php

namespace OpenWebAddict\SocialStream;

abstract class SocialNetworkReaderAbstract implements SocialNetworkReader
{

    protected $app = null;

    public function __construct(SocialNetworkApp $app)
    {
        $this->app = $app;
    }

    public function getStream()
    {
        $streamItems = [];

        $endpoints = $this->app->getEndpoints();

        foreach ($endpoints as $endpoint) {
            $items = $this->fetchItems($endpoint);

            foreach ($items as $item) {
                $normalizedItem = $this->normalizeItem($item);

                $normalizedItem['rs_type'] = $this->app->getName();
                $streamItems[] = $normalizedItem;
            }
        }

        $hashtags = $this->app->getHashtags();
        if (!empty($hashtags)) {
            $items = $this->fetchItems(null, $hashtags);

            foreach ($items as $item) {
                $normalizedItem = $this->normalizeItem($item);

                $normalizedItem['rs_type'] = $this->app->getName();
                $streamItems[] = $normalizedItem;
            }
        }

        return $streamItems;
    }

    abstract protected function fetchItems($endpoint = null, array $hashtags = []);

    abstract protected function normalizeItem($item);
}

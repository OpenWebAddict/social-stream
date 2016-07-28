<?php

namespace OpenWebAddict\SocialStream;

abstract class SocialNetworkAppAbstract implements SocialNetworkApp
{
    protected $configuration = [];
    protected $endpoints = [];
    protected $hashtags = [];

    public function setConfiguration(array $conf)
    {
        $this->configuration = $conf;
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function addEndpoint($endpoint)
    {
        $this->endpoints[] = $endpoint;
    }

    public function getEndpoints()
    {
        return $this->endpoints;
    }

    public function addHashtag($hashtag)
    {
        $this->hashtags[] = $hashtag;
    }

    public function getHashtags()
    {
        return $this->hashtags;
    }
}

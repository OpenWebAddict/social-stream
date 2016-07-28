<?php

namespace OpenWebAddict\SocialStream;

/**
 * Interface SocialNetworkApp
 * @package OpenWebAddict\SocialStream
 */
interface SocialNetworkApp
{
    public function getName();

    public function setConfiguration(array $conf);

    public function getConfiguration();

    public function getReader();

    public function addEndpoint($endpoint);

    public function getEndpoints();

    public function addHashtag($hashtag);

    public function getHashtags();
}

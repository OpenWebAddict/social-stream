<?php
namespace OpenWebAddict\SocialStream\App;

use OpenWebAddict\SocialStream\Reader\TwitterReader;
use OpenWebAddict\SocialStream\SocialNetworkAppAbstract;
use TwitterAPIExchange;

/**
 * Twitter app manages twitter api connection and initialize its own reader.
 */
class TwitterApp extends SocialNetworkAppAbstract
{

    private $tw = null;

    public function __construct(array $conf)
    {
        $this->setConfiguration($conf);

        $this->tw = new TwitterAPIExchange([
            'oauth_access_token' => $this->configuration['oauth_access_token'],
            'oauth_access_token_secret' => $this->configuration['oauth_access_token_secret'],
            'consumer_key' => $this->configuration['consumer_key'],
            'consumer_secret' => $this->configuration['consumer_secret'],
        ]);
    }

    public function getName()
    {
        return 'twitter';
    }

    public function getSdk()
    {
        return $this->tw;
    }

    public function getReader()
    {
        return new TwitterReader($this);
    }
}

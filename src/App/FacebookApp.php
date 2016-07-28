<?php
namespace OpenWebAddict\SocialStream\App;

use Facebook\Facebook;
use OpenWebAddict\SocialStream\Reader\FacebookReader;
use OpenWebAddict\SocialStream\SocialNetworkAppAbstract;

/**
 * Facebook app manages facebook api connection and initialize its own reader.
 */
class FacebookApp extends SocialNetworkAppAbstract
{

    private $fb = null;

    public function __construct(array $conf)
    {
        $this->setConfiguration($conf);

        $this->fb = new Facebook([
            'app_id' => $this->configuration['app_id'],
            'app_secret' => $this->configuration['app_secret'],
            'default_graph_version' => 'v2.7',
        ]);
    }

    public function getName()
    {
        return 'facebook';
    }

    public function getAccessToken()
    {
        return $this->configuration['app_id'].'|'.$this->configuration['app_secret'];
    }

    public function getSdk()
    {
        return $this->fb;
    }

    public function getReader()
    {
        return new FacebookReader($this);
    }
}

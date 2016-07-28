<?php

use OpenWebAddict\SocialStream\App\FacebookApp;
use OpenWebAddict\SocialStream\App\TwitterApp;
use OpenWebAddict\SocialStream\SocialStream;

/**
 * SocialStream test case.
 */
class SocialStreamTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $twitter = new TwitterApp([
            'oauth_access_token' => '2828303359-5VdxSdACSh1eGVxUu74B2U3767g3yTBQf1ijN4L',
            'oauth_access_token_secret' => 'vU8tUn89YBprOetnrW7EokAiAWH6dgNdX6XPMv9FXxjCw',
            'consumer_key' => 'qm3WM6QbPr29kg27MvLxc919e',
            'consumer_secret' => 'GhWYWITCWOM1xidS5BZ7fjPyoZEbbMfenDt2rPEllHOT6HbE8o',
        ]);
        $twitter->addEndpoint('misterdoak');

        $facebook = new FacebookApp([
            'app_id' => '316846175332958',
            'app_secret' => '2e860e070300d37f5ae3a56eb1a7aa80',
            'default_graph_version' => 'v2.7',
        ]);
        $facebook->addEndpoint('openwebaddict');

        $socialStream = SocialStream::getInstance();
        $socialStream->addSocialNetworkApp($twitter);
        $socialStream->addSocialNetworkApp($facebook);
    }

    public function testGetPosts()
    {
        $socialStream = SocialStream::getInstance();
        $items = $socialStream->getStream();

        $this->assertArrayHasKey(0, $items);
    }
}

<?php

use OpenWebAddict\SocialStream\App\TwitterApp;
use OpenWebAddict\SocialStream\SocialStream;

/**
 * Twitter test case.
 */
class TwitterReaderTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $app = new TwitterApp([
            'oauth_access_token' => '2828303359-5VdxSdACSh1eGVxUu74B2U3767g3yTBQf1ijN4L',
            'oauth_access_token_secret' => 'vU8tUn89YBprOetnrW7EokAiAWH6dgNdX6XPMv9FXxjCw',
            'consumer_key' => 'qm3WM6QbPr29kg27MvLxc919e',
            'consumer_secret' => 'GhWYWITCWOM1xidS5BZ7fjPyoZEbbMfenDt2rPEllHOT6HbE8o',
        ]);
        $app->addEndpoint('misterdoak');

        $socialStream = SocialStream::getInstance();
        $socialStream->addSocialNetworkApp($app);
    }

    public function testGetPosts()
    {
        $socialStream = SocialStream::getInstance();
        $items = $socialStream->getStream();

        $this->assertArrayHasKey(0, $items);
    }
}

<?php

use OpenWebAddict\SocialStream\App\FacebookApp;
use OpenWebAddict\SocialStream\SocialStream;
use PHPUnit_Framework_TestCase;

/**
 * Facebook test case.
 */
class FacebookReaderTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $app = new FacebookApp([
            'app_id' => '316846175332958',
            'app_secret' => '2e860e070300d37f5ae3a56eb1a7aa80',
            'default_graph_version' => 'v2.7',
        ]);
        $app->addEndpoint('openwebaddict');

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

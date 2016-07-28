# Social Stream
Fetch content from various social network and try to provide a uniq interface upon social networks API.

## Social networks
* Facebook
* Twitter

## Roadmap
* Youtube
* Instagram
* Pinterest
* Vine

## Example
See unit tests

Or find below an example :
```php
        $twitter = new TwitterApp([
            'oauth_access_token' => 'XXX',
            'oauth_access_token_secret' => 'XXX',
            'consumer_key' => 'XXX',
            'consumer_secret' => 'XXX',
        ]);
        $twitter->addEndpoint('<user name>');

        $facebook = new FacebookApp([
            'app_id' => 'XXX',
            'app_secret' => 'XXX',
            'default_graph_version' => 'v2.7',
        ]);
        $facebook->addEndpoint('<page id>');

        $socialStream = SocialStream::getInstance();
        $socialStream->addSocialNetworkApp($twitter);
        $socialStream->addSocialNetworkApp($facebook);
        $items = $socialStream->getStream();
        /**
         * $items :
         * array(24) {
         *    [0]=>
         *     array(7) {
         *      ["title"]=>
         *      NULL
         *      ["description"]=>
         *      string(62) "Test du nouveau module Drupal socialize http://t.co/coYLrv46l2"
         *      ["published_time"]=>
         *       string(30) "Tue Sep 23 16:37:29 +0000 2014"
         *      ["picture"]=>
         *      string(46) "http://pbs.twimg.com/media/ByO0vUgCMAIdzgJ.jpg"
         *      ["link"]=>
         *      NULL
         *      ["item_type"]=>
         *      NULL
         *      ["rs_type"]=>
         *      string(7) "twitter"
         *    }
         *    [1]=>
         *    array(7) {
         *      ["title"]=>
         *      NULL
         *      ["description"]=>
         *      string(32) "Test demo http://t.co/nWf0E9VJuJ"
         *      ["published_time"]=>
         *      string(30) "Wed Sep 24 07:37:30 +0000 2014"
         *      ["picture"]=>
         *      string(46) "http://pbs.twimg.com/media/BySCvOGIQAAuLbS.jpg"
         *      ["link"]=>
         *      NULL
         *      ["item_type"]=>
         *      NULL
         *      ["rs_type"]=>
         *      string(7) "twitter"
         *    }
         */
        
```

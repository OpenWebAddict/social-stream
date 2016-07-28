<?php

namespace OpenWebAddict\SocialStream\Reader;

use OpenWebAddict\SocialStream\SocialNetworkReaderAbstract;

/**
 * Fetch tweets from a user or a list of hashtags.
 *
 * @package OpenWebAddict\SocialStream\Reader
 */
class TwitterReader extends SocialNetworkReaderAbstract
{
    protected function fetchItems($endpoint = null, array $hashtags = [])
    {
        $url = '';
        $getfield = '';
        if ($endpoint !== null) {
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            $getfield = '?screen_name='.$endpoint.'&include_rts=false';
        } else {
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q='.implode('+OR+', $hashtags);
        }

        $response = $this->app->getSdk()->setGetfield($getfield)
            ->buildOauth($url, 'GET')
            ->performRequest();

        return json_decode($response, true);
    }

    protected function normalizeItem($item)
    {
        return [
            'title' => null,
            'description' => $item['text'],
            'published_time' => $item['created_at'],
            'picture' => isset($item['entities']['media']) ? $item['entities']['media'][0]['media_url'] : null,
            'link' => null,
            'item_type' => null,
        ];
    }
}

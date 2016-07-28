<?php

namespace OpenWebAddict\SocialStream\Reader;

use Facebook\FacebookRequest;
use OpenWebAddict\SocialStream\SocialNetworkReaderAbstract;

/**
 * Fetch facebook posts from a public endpoint.
 */
class FacebookReader extends SocialNetworkReaderAbstract
{
    public function fetchItems($endpoint = null, array $hashtags = [])
    {
        $rq = new FacebookRequest(
            $this->app->getSdk()->getApp(),
            $this->app->getAccessToken(),
            'GET',
            '/'.$endpoint,
            ['fields' => 'posts{created_time,description,message,type,link,name,full_picture}']
        );

        $response = $this->app->getSdk()->getClient()->sendRequest($rq);
        $body = $response->getDecodedBody();

        return $body['posts']['data'];
    }

    protected function normalizeItem($item)
    {
        return [
            'title' => isset($item['name']) ? $item['name'] : null,
            'description' => isset($item['message']) ? $item['message'] : null,
            'published_time' => isset($item['created_time']) ? $item['created_time'] : null,
            'picture' => isset($item['full_picture']) ? $item['full_picture'] : null,
            'link' => isset($item['link']) ? $item['link'] : null,
            'item_type' => $item['type'],
        ];
    }
}

<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterService
{
    protected $twitter;

    public function __construct()
    {
        $this->twitter = new TwitterOAuth(
            config('services.twitter.api_key'),
            config('services.twitter.api_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );
    }

    public function tweet(string $message)
    {
        return $this->twitter->post("statuses/update", ["status" => $message]);
    }
}

<?php

namespace CRUX\Providers;

use Phirehose;
use Illuminate\Support\ServiceProvider;
use CRUX\TwitterStream;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->app->bind('CRUX\TwitterStream', function ($app) {
            $twitter_access_token = env('TWITTER_ACCESS_TOKEN', null);
            $twitter_access_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET', null);
            return new TwitterStream($twitter_access_token, $twitter_access_token_secret, Phirehose::METHOD_FILTER);
        });
    }
}

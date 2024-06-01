<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Geocoder\Provider\Nominatim\Nominatim;
use Http\Adapter\Guzzle7\Client as GuzzleClient;
use Geocoder\StatefulGeocoder;

class GeocoderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('geocoder', function ($app) {
            $httpClient = new GuzzleClient();
            $provider = Nominatim::withOpenStreetMapServer($httpClient, 'your-app-name/your-email@example.com');
            $geocoder = new StatefulGeocoder($provider, 'en');
            return $geocoder;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

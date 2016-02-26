<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(
            'App\Repositories\DeviceRepositoryInterface',
            'App\Repositories\DbDeviceRepository'
        );
        $this->app->bind(
            'App\Repositories\SiteRepositoryInterface',
            'App\Repositories\DbSiteRepository'
        );
        $this->app->bind(
            'App\Repositories\CustomerRepositoryInterface',
            'App\Repositories\DbCustomerRepository'
        );
        $this->app->bind(
            'App\Repositories\AlertRepositoryInterface',
            'App\Repositories\DbAlertRepository'
        );
        $this->app->bind(
            'App\Alerts\DiscoveryAlertHandlerInterface',
            'App\Alerts\DiscoveryAlertHandler'
        );
    }

}

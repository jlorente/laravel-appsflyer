<?php

/**
 * Part of the Appsflyer Laravel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Appsflyer Laravel
 * @version    7.0.0
 * @author     Jose Lorente
 * @license    BSD License (3-clause)
 * @copyright  (c) 2018, Jose Lorente
 */

namespace Jlorente\Laravel\Appsflyer;

use Jlorente\Appsflyer\Appsflyer;
use Jlorente\Appsflyer\Config;
use Jlorente\Appsflyer\ConfigInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppsflyerServiceProvider.
 * 
 * @author Jose Lorente <jose.lorente.martin@gmail.com>
 */
class AppsflyerServiceProvider extends ServiceProvider
{

    /**
     * @inheritdoc
     */
    protected $defer = true;

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->registerAppsflyer();

        $this->registerConfig();
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'appsflyer'
            , 'appsflyer.config'
            , Appsflyer::class
            , Config::class
            , ConfigInterface::class
        ];
    }

    /**
     * Register the Appsflyer API class.
     *
     * @return void
     */
    protected function registerAppsflyer()
    {
        $this->app->singleton('appsflyer', function ($app) {
            $config = $app['config']->get('services.appsflyer');
            $devKey = isset($config['dev_key']) ? $config['dev_key'] : null;
            $apiToken = isset($config['api_token']) ? $config['api_token'] : null;
            return new Appsflyer($devKey, $apiToken);
        });

        $this->app->alias('appsflyer', Appsflyer::class);
    }

    /**
     * Register the config class.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->app->singleton('appsflyer.config', function ($app) {
            return $app['appsflyer']->getConfig();
        });
        $this->app->alias('appsflyer.config', Config::class);
        $this->app->alias('appsflyer.config', ConfigInterface::class);
    }

}

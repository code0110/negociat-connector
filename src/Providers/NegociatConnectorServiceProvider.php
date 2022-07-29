<?php

namespace Botble\NegociatConnector\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Event;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\ServiceProvider;

class NegociatConnectorServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setNamespace('plugins/negociat-connector')
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {           

                dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugin-negociat-connector',
                    'priority'    => 9,
                    'parent_id'   => null,
                    'name'        => 'plugins/negociat-connector::negociat-connector.name',
                    'icon'        => 'negociat-icon',
                    'url'         => '',
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-negociat-connector2',
                    'priority'    => 10,
                    'parent_id'   => 'cms-plugin-negociat-connector',
                    'name'        => 'plugins/negociat-connector::negociat-connector.name',
                    'icon'        => 'negociat-icon',
                    'url'         => route('negociat-connector'),
                    'permissions' => ['settings.options'],
                ]);        
   
        });
    }
}

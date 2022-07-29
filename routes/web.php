<?php

Route::group([
    'namespace'  => 'Botble\NegociatConnector\Http\Controllers',
    'middleware' => ['web', 'core'],
], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::get('negociat-connector', [
            'as'         => 'negociat-connector',
            'uses'       => 'NegociatConnectorController@index',
            'permission' => 'settings.options',
        ]);     

    Route::post('negociat-connector', [
            'as'         => 'negociat-connector.import',
            'uses'       => 'NegociatConnectorController@import_negociat',
            'permission' => 'settings.options',
        ]);
    });

    Route::get('negociat-connector', [
            'as'         => 'negociat-connector.export',
            'uses'       => 'NegociatConnectorController@export',
            'permission' => 'settings.options',
        ]);
 
});

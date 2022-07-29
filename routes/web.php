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
            'as'         => 'negociat-connector.post',
            'uses'       => 'NegociatConnectorController@import',
            'permission' => 'settings.options',
        ]);
    });
});

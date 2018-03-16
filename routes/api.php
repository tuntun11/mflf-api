<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){

    $api->group(['middleware' => ['throttle:60,1', 'bindings'], 'namespace' => 'App\Http\Controllers'], function($api) {

        $api->get('ping', 'Api\PingController@index');

        $api->group(['middleware' => ['auth:api'], ], function ($api) {

            $api->group(['prefix' => 'users'], function ($api) {
                $api->get('/', 'Api\Users\UsersController@index');
                $api->post('/', 'Api\Users\UsersController@store');
                $api->get('/{uuid}', 'Api\Users\UsersController@show');
                $api->put('/{uuid}', 'Api\Users\UsersController@update');
                $api->patch('/{uuid}', 'Api\Users\UsersController@update');
                $api->delete('/{uuid}', 'Api\Users\UsersController@destroy');
            });

            $api->group(['prefix' => 'roles'], function ($api) {
                $api->get('/', 'Api\Users\RolesController@index');
                $api->post('/', 'Api\Users\RolesController@store');
                $api->get('/{uuid}', 'Api\Users\RolesController@show');
                $api->put('/{uuid}', 'Api\Users\RolesController@update');
                $api->patch('/{uuid}', 'Api\Users\RolesController@update');
                $api->delete('/{uuid}', 'Api\Users\RolesController@destroy');
            });

            $api->get('permissions', 'Api\Users\PermissionsController@index');

            $api->group(['prefix' => 'me'], function($api) {
                $api->get('/', 'Api\Users\ProfileController@index');
                $api->put('/', 'Api\Users\ProfileController@update');
                $api->patch('/', 'Api\Users\ProfileController@update');
                $api->put('/password', 'Api\Users\ProfileController@updatePassword');
            });

            $api->group(['prefix' => 'assets'], function($api) {
                $api->post('/', 'Api\Assets\UploadFileController@store');
            });

            /*--api use for app or report tool--*/
            //บุคลากร มฟล ข้อมูลอัพเดทจาก IT
            $api->group(['prefix' => 'personnels'], function ($api) {
                $api->get('/', 'Api\PersonnelsController@index');
                $api->get('/{id}', 'Api\PersonnelsController@show');
                $api->get('/search/{keyword?}', 'Api\PersonnelsController@search');
                $api->get('/department/{dept}', 'Api\PersonnelsController@department')->where('dept', '[0-9]{3}');
            });
            //แผนก ข้อมูลอัพเดทจาก IT
            $api->group(['prefix' => 'departments'], function ($api) {
                $api->get('/', 'Api\DepartmentsController@index');
                $api->get('/{code}', 'Api\DepartmentsController@show');
            });
            //ประเทศต่างๆ ไอคอนธงชาติ
            $api->group(['prefix' => 'countries'], function ($api) {
                $api->get('/', 'Api\CountriesController@index');
                $api->get('/{code}', 'Api\CountriesController@show');
            });

            //โครงการของ มฟล.
            $api->group(['prefix' => 'projects'], function ($api) {
                $api->get('/', 'Api\MflfProjectsController@index');
                $api->get('/{code}', 'Api\MflfProjectsController@show');
            });

        });

    });

});




<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Web Pages Survenia http://66.198.240.13/~survenia/
$router->get('/', 'SurveniaWebPagesController@index');
$router->get('/registro','SurveniaWebPagesController@registro');
$router->get('/mi_cuenta','SurveniaWebPagesController@miCuenta');
$router->get('/terminos', 'SurveniaWebPagesController@terminos');
$router->get('/contacto', 'SurveniaWebPagesController@contacto');
$router->get('/plantillas', 'SurveniaWebPagesController@plantillas');
//$router->get('/mis_encuestas', 'SurveniaWebPagesController@misEncuestas');
$router->get('/crear_encuesta2', 'SurveniaWebPagesController@crearEncuesta2');
$router->get('/articulos', 'SurveniaWebPagesController@articulos');
$router->get('/encuestas_publicas', 'SurveniaWebPagesController@encuestasPublicas');
$router->get('/encuestas_publicas_detalle', 'SurveniaWebPagesController@encuestasPublicasDetalle');
$router->get('/como_funciona', 'SurveniaWebPagesController@comoFunciona');
$router->get('/calculadora', 'SurveniaWebPagesController@calculadora');
$router->get('/planes', 'SurveniaWebPagesController@planes');	

$router->resource('/inicio_sesion','InicioSesionController');

$router->resource('/encuestas', 'EncuestasController');
$router->get('/encuestas/{id}', 'EncuestasController@create');
$router->get('/encuestas/show', 'EncuestasController@show');
$router->get('/get-options/{type}', 'EncuestasController@getOptions');
$router->post('/encuestas/storeTemplate', 'EncuestasController@storeTemplate');
$router->post('/encuestas/storeSurveyContent', 'EncuestasController@storeSurveyContent');

$router->resource('/mis_encuestas', 'MisEncuestasController');


$router->resource('/my_account','MyAccountController');

//paypal
Route::get('paypal/ec-checkout', 'PayPalController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'PayPalController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
Route::post('paypal/notify', 'PayPalController@notify');


//Login with Facebook 
$router->get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
$router->get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Login with Gmail
$router->get('/social/redirect/{provider}', 'Auth\SocialController@getSocialRedirect')->name('redirectSocialLite');
$router->get('/social/handle/{provider}', 'Auth\SocialController@getSocialHandle')->name('handleSocialLite');

$router->get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

$router->group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:0']], function($router) {
    $router->get('/', 'DashboardController@index')->name('dash');
    $router->resource('users', 'UserController');
});

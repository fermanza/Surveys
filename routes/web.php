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


Route::get('setLanguage/{lang}','HomeController@setLanguage');

Route::get('/', 'SurveniaWebPagesController@index');
Route::get('/registro','SurveniaWebPagesController@registro');
Route::get('/mi_cuenta','SurveniaWebPagesController@miCuenta');
Route::get('/terminos', 'SurveniaWebPagesController@terminos');
Route::get('/contacto', 'SurveniaWebPagesController@contacto');
Route::get('/plantillas', 'SurveniaWebPagesController@plantillas');
//Route::get('/mis_encuestas', 'SurveniaWebPagesController@misEncuestas');
Route::get('/crear_encuesta2', 'SurveniaWebPagesController@crearEncuesta2');
Route::get('/articulos', 'SurveniaWebPagesController@articulos');
Route::get('/encuestas_publicas', 'SurveniaWebPagesController@encuestasPublicas');
Route::get('/encuestas_publicas_detalle', 'SurveniaWebPagesController@encuestasPublicasDetalle');
Route::get('/como_funciona', 'SurveniaWebPagesController@comoFunciona');
Route::get('/calculadora', 'SurveniaWebPagesController@calculadora');
Route::get('/planes', 'SurveniaWebPagesController@planes');	

Route::resource('/inicio_sesion','InicioSesionController');

Route::resource('/encuestas', 'EncuestasController');
Route::get('/encuestas/{id}', 'EncuestasController@create');
Route::get('/encuestas/show', 'EncuestasController@show');
Route::get('/get-options/{type}', 'EncuestasController@getOptions');
Route::post('/encuestas/storeTemplate', 'EncuestasController@storeTemplate');
Route::post('/encuestas/storeSurveyContent', 'EncuestasController@storeSurveyContent');
Route::get('/encuestas/contestar/{id}', 'EncuestasController@answerTemplate');

Route::resource('/mis_encuestas', 'MisEncuestasController');



Route::resource('/my_account','MyAccountController');

//paypal
Route::get('checkout', 'PayPalController@getExpressCheckout');
Route::get('checkout-success', 'PayPalController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
Route::post('paypal/notify', 'PayPalController@notify');
Route::get('creditos','PayPalController@index');

//encuesta guardar
Route::post('saveQuestion','EncuestasController@saveQuestion');


//Login with Facebook 
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Login with Gmail
Route::get('/social/redirect/{provider}', 'Auth\SocialController@getSocialRedirect')->name('redirectSocialLite');
Route::get('/social/handle/{provider}', 'Auth\SocialController@getSocialHandle')->name('handleSocialLite');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

$router->group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:0']], function($router) {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
});

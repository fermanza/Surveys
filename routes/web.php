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

Route::get('mis_encuestas/excel/{id}', 'EncuestasController@getBladeExcel');

Route::get('/registro','SurveniaWebPagesController@registro');

Route::post('/sendContactForm', 'EncuestasController@sendContactForm');

Route::get('/terminos', 'SurveniaWebPagesController@terminos');
Route::get('/contacto', 'SurveniaWebPagesController@contacto');
Route::get('/plantillas', 'SurveniaWebPagesController@plantillas');
Route::get('/articulos', 'SurveniaWebPagesController@articulos');
//Route::get('/encuestas_publicas', 'SurveniaWebPagesController@encuestasPublicas');
Route::get('/encuestas_publicas_detalle', 'SurveniaWebPagesController@encuestasPublicasDetalle');
Route::get('/como_funciona', 'SurveniaWebPagesController@comoFunciona');
Route::get('/calculadora', 'SurveniaWebPagesController@calculadora');
Route::get('/planes', 'SurveniaWebPagesController@planes');
Route::resource('/inicio_sesion','InicioSesionController');

Route::get('/bitly/{id}','EncuestasController@bitly');

Route::get('/encuestas/responder/{id}', 'EncuestasController@answerTemplate');

Route::get('/responder/{token}','EncuestasController@responderEncuesta');

Route::resource('/mis_encuestas', 'MisEncuestasController');
Route::get('/mis_encuestas', 'MisEncuestasController@index');

//Route::get('/mi_cuenta','SurveniaWebPagesController@miCuenta');
Route::resource('/my_account','MyAccountController');
Route::post('/saveAnswer', 'EncuestasController@saveAnswer');

//Login with Facebook/
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Login with Gmail
Route::get('/social/redirect/{provider}', 'Auth\SocialController@getSocialRedirect')->name('redirectSocialLite');
Route::get('/social/handle/{provider}', 'Auth\SocialController@getSocialHandle')->name('handleSocialLite');

Route::post('iniciarsesion','LoginController@authenticate');

Auth::routes();


Route::get('login','LoginController@getLogin');

Route::resource('/encuestas_publicas' , 'EncuestasPublicasController');


Route::get('/articulosCompartir/{id}', 'ArticulosController@bitly');
Route::resource('/articulos', 'ArticulosController');
Route::post('/copyTemplate', 'EncuestasController@copyTemplate');


Route::group(['middleware' => ['Authuser']], function () {
    Route::get('/encuestas/create2/{id}', 'EncuestasController@create2');
    Route::post('/encuestas/save2', 'EncuestasController@saveQuestion2');
    Route::resource('/encuestas', 'EncuestasController');
    Route::get('/mis_encuestas/respuestas/{id}', 'EncuestasController@getRespuestas');
    Route::get('/mis_encuestas/finalizar/{id}', 'MisEncuestasController@finalizar');
    Route::get('/mis_encuestas/approval/{id_template}/{status}', 'EncuestasController@approval');
    Route::get('/mis_encuestas/changeSurveyType/{id_template}/{type}','EncuestasController@changeSurveyType');
    Route::resource('/my_account','MyAccountController');

    //paypal
    Route::get('checkout', 'PaypalController@getExpressCheckout');
    Route::get('checkout-success', 'PaypalController@getExpressCheckoutSuccess');
    Route::get('paypal/adaptive-pay', 'PaypalController@getAdaptivePay');
    Route::post('paypal/notify', 'PaypalController@notify');
    Route::get('creditos','PaypalController@index');

    //encuesta guardar
    Route::post('saveQuestion','EncuestasController@saveQuestion');
    Route::post('saveQuestion2', 'EncuestasController@saveQuestion2');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    // display single post
    //Route::get('/{slug}',['as' => 'article', 'uses' => 'ArticulosController@show'])->where('slug', '[A-Za-z0-9-_]+');
    Route::get('/encuestas/{id}', 'EncuestasController@create');
    Route::get('/encuestas/show', 'EncuestasController@show');
    Route::get('/get-options/{type}', 'EncuestasController@getOptions');
    Route::post('/encuestas/storeTemplate', 'EncuestasController@storeTemplate');
    Route::post('/encuestas/storeSurveyContent', 'EncuestasController@storeSurveyContent');
    Route::get('/reporte_avanzado/{idEncuesta}', 'EncuestasPublicasController@showAdvancedReport');
    Route::get('/getQuestions/{idEncuesta}', 'EncuestasPublicasController@getQuestions');

});

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

$router->group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:0']], function($router) {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::get('users/creditos/{id}','UserController@creditos')->name('admin.users.creditos');
    // Route::get('users/reports','UserController@useReport')->name('admin.users.reports');
    Route::get('users/reports', 'UserController@useReport');
    Route::resource('users', 'UserController');
    Route::resource('surveys','SurveyController');
    Route::get('users/creditos/insertCredit/{idPlan}/{idUser}', 'UserController@insertCredit');
});

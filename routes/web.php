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

//Route::get('/mi_cuenta','SurveniaWebPagesController@miCuenta');


Route::resource('/my_account','MyAccountController');

Route::post('/saveAnswer', 'EncuestasController@saveAnswer');




/*Route::resource('/encuestas', 'EncuestasController');
Route::get('/encuestas/{id}', 'EncuestasController@create');
Route::get('/encuestas/show', 'EncuestasController@show');
Route::get('/get-options/{type}', 'EncuestasController@getOptions');
Route::post('/encuestas/storeTemplate', 'EncuestasController@storeTemplate');
Route::post('/encuestas/storeSurveyContent', 'EncuestasController@storeSurveyContent');
*/

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

Route::group(['middleware' => ['Authuser']], function () {
    


	
 
    Route::resource('/mis_encuestas', 'MisEncuestasController');

    Route::get('/mis_encuestas/respuestas/{id}', 'EncuestasController@getRespuestas');

    Route::resource('/my_account','MyAccountController');

    //paypal
    Route::get('checkout', 'PaypalController@getExpressCheckout');
    Route::get('checkout-success', 'PaypalController@getExpressCheckoutSuccess');
    Route::get('paypal/adaptive-pay', 'PaypalController@getAdaptivePay');
    Route::post('paypal/notify', 'PaypalController@notify');
    Route::get('creditos','PaypalController@index');

    //encuesta guardar
    Route::post('saveQuestion','EncuestasController@saveQuestion');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('/encuestas', 'EncuestasController');
    Route::resource('/articulos', 'ArticulosController');

    // display single post   
    //Route::get('/{slug}',['as' => 'article', 'uses' => 'ArticulosController@show'])->where('slug', '[A-Za-z0-9-_]+');

  


Route::get('/encuestas/{id}', 'EncuestasController@create');
Route::get('/encuestas/show', 'EncuestasController@show');
Route::get('/get-options/{type}', 'EncuestasController@getOptions');
Route::post('/encuestas/storeTemplate', 'EncuestasController@storeTemplate');
Route::post('/encuestas/storeSurveyContent', 'EncuestasController@storeSurveyContent');



});



/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

$router->group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:0']], function($router) {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::get('users/creditos/{id}','UserController@creditos')->name('admin.users.creditos');
    Route::resource('users', 'UserController');
});

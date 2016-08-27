<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dpr.index');
});
Route::get('appliedfor/{position}/{id}/{type}', 'ApplicantController@appliedfor');

Route::auth();
Route::get('/panel' ,'AdminController@panel');
Route::get('/poscat' ,'AdminController@disppostbycat');
Route::get('/deletepos/{id}' ,'AdminController@deletepos');
Route::get('/addposition/{jobcat}/{ref_no}/{title}/{qualreq}/{desc}' ,'AdminController@addposition');
Route::get('/modifypos/{jobcat}/{ref_no}/{title}/{qualreq}/{desc}' ,'AdminController@modifyposition');
Route::post('/decision' ,'AdminController@decision');
Route::get('/download/{id}' ,'AdminController@downloadcv');
Route::get('/search' ,'AdminController@search');
Route::get('/login', 'HomeController@index');
Route::get('/export','AdminController@exportexcel');
Route::get('/manageposition','AdminController@manageposition');
Route::post('/registerapplicant', 'HomeController@registerapplicant');
Route::get('/register', 'HomeController@register');
Route::get('/available/{cat}', 'ApplicantController@availablejobs');
Route::get('/jobtype', 'ApplicantController@listjobcat');
Route::get('appliedfor/{position}/{id}/{type}', 'ApplicantController@appliedfor');

#################################################3
//start dejiroute
//#################################################
Route::post('/apply', 'ApplicantController@apply');

Route::get('/contact', 'ApplicantController@contact');

Route::post('/contact', 'ApplicantController@savecontact');

Route::get('/education', 'ApplicantController@education');

Route::post('/education', 'ApplicantController@saveducation');

###############################################
//added on 24/08/2016
###############################################
Route::post('/bio', 'ApplicantController@bio');

Route::get('/others', 'ApplicantController@others');

Route::post('/others_quals', 'ApplicantController@saveothersquals');

Route::delete('/deletequals/{id}', 'ApplicantController@deletequal');

Route::post('/others_exp', 'ApplicantController@saveothersexp');

Route::delete('/deleteexp/{id}', 'ApplicantController@deleteexp');

Route::post('/others_ref', 'ApplicantController@saveothersref');

Route::delete('/deleteref/{id}', 'ApplicantController@deleteref');

Route::get('/profile/{id}', 'ApplicantController@profiledit');

Route::post('/profile', 'ApplicantController@profile');

Route::post('/complete', 'ApplicantController@appcomplete');

Route::post('/savecenter', 'ApplicantController@savecenter');
###########################################3
//end deji route
//############################################################
//PASSWORDRESET Route view
//#############################################################
Route::get('/forgot', 'HomeController@forget');
Route::get('/change', 'HomeController@change');


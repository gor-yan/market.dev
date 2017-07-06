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

Route::get('/', 'IndexController@index');

// Register Part
Route::get('register-as/{freelancer}', 'Auth\RegisterController@registerAs');
Route::get('register-as', 'Auth\RegisterController@registerAs');
Auth::routes();
//
Route::get('/home', 'HomeController@index');

// Freelancer Routes
Route::group(['prefix' => 'freelancer', 'middleware' => ['freelancer', 'auth']], function () {
    Route::get('/', 'FreelancerController@index');
    Route::match(['get', 'post'], '/settings/main', 'FreelancerController@mainSettings');
    Route::match(['get', 'post'], '/settings/payment', 'FreelancerController@paymentSettings');
    Route::match(['get', 'post'], '/settings/additional', 'FreelancerController@additionalSettings');
    Route::post('/education/add', 'EducationController@add');
    Route::post('/education/edit', 'EducationController@edit');
    Route::post('/employment/add', 'EmploymentController@add');
    Route::post('/employment/edit', 'EmploymentController@edit');
    Route::post('/portfolio/add', 'PortfolioController@add');
    Route::post('/portfolio/edit', 'PortfolioController@edit');
    // Add proposal
    Route::get('/proposal/{id}', 'ProposalsController@proposal');
    // Submit Proposal
    Route::post('/proposal/submit', 'ProposalsController@submitProposal');
    // Show current
    Route::get('/proposals/{id}', 'ProposalsController@index');
    // Show current
    Route::get('/proposal/edit/{id}', 'ProposalsController@edit');
    //Delete Proposal
    /*Route::get('/proposal/delete/{id}', 'ProposalsController@delete');*/

    Route::get('/proposals-history', 'FreelancerController@proposalsHistory');
});

// Client Routes
Route::group(['prefix' => 'client', 'middleware' => ['client', 'auth']], function () {
    Route::get('/', 'ClientController@index');
    Route::get('/jobs', 'ClientController@allJobs');
    Route::match(['get', 'post'], '/job/add', 'JobController@add');
    Route::get('/job/edit/{id}', 'JobController@edit');
    Route::post('/job/edit/', 'JobController@edit');
    Route::get('/job/proposals/{id}', 'ClientController@allJobProposals');
    Route::get('/proposals/{id}', 'ProposalsController@index');
});

//Common Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/job/details/{id}', 'JobController@details');
    Route::get('/job/download/{file}', 'JobController@download');
});

Route::get('/freelancers/{unique_id}', 'UserCommonSearchController@getByUserIdentity');
Route::get('/subcategories', 'CategoryController@getSubCategories');
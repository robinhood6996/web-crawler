<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
// Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/indeed', [App\Http\Controllers\HomeController::class, 'Indeed'])->name('indeed');
Route::get('/ebay', [App\Http\Controllers\HomeController::class, 'ebayArticles'])->name('ebay');
Route::get('/freelancer', [App\Http\Controllers\HomeController::class, 'freelancerMap'])->name('freelancer');
Route::get('/home-pagination-index', [App\Http\Controllers\HomeController::class, 'fetch_home_data'])->name('home-pagination-index');
Route::get('/indeed-pagination-index', [App\Http\Controllers\HomeController::class, 'fetch_indeed_data'])->name('indeed-pagination-index');
Route::get('/freelancer-pagination-index', [App\Http\Controllers\HomeController::class, 'fetch_freelancer_data'])->name('freelancer-pagination-index');
Route::get('/article-list', [App\Http\Controllers\HomeController::class, 'articleList'])->name('article-list');
Route::get('/freelancer-list', [App\Http\Controllers\HomeController::class, 'freelancerList'])->name('freelancer-list');
Route::get('/indeed-list', [App\Http\Controllers\HomeController::class, 'IndeedList'])->name('indeed-list');
Route::get('/add-article', [App\Http\Controllers\HomeController::class, 'add_article'])->name('add-article');

Route::post('/article-form', [App\Http\Controllers\HomeController::class, 'store']);
Route::post('/edit-article', [App\Http\Controllers\HomeController::class, 'editArticleStatus'])->name('edit-article');
Route::post('/edit-freelancer-status', [App\Http\Controllers\HomeController::class, 'editFreelancerStatus'])->name('edit-freelancer-status');
Route::post('/edit-hrfr-status', [App\Http\Controllers\HomeController::class, 'editHrFrStatus'])->name('edit-hrfr-status');
Route::post('/edit-date', [App\Http\Controllers\HomeController::class, 'editDateStatus'])->name('edit-date');
Route::post('/assign-article', [App\Http\Controllers\HomeController::class, 'assignArticle'])->name('assign-article');
Route::post('/edit-type-status', [App\Http\Controllers\HomeController::class, 'editTypeStatus'])->name('edit-type-status');
Route::post('/edit-indeed-status', [App\Http\Controllers\HomeController::class, 'editIndeedStatus'])->name('edit-indeed-status');
Route::post('/delete-description', [App\Http\Controllers\HomeController::class, 'deleteDescription'])->name('delete-description');
Route::post('/delete-freelancer-description', [App\Http\Controllers\HomeController::class, 'deleteFreelancerDescription'])->name('delete-freelancer-description');
Route::post('/delete-indeed-description', [App\Http\Controllers\HomeController::class, 'deleteIndeedDescription'])->name('delete-indeed-description');
//Update ebay job article
Route::post('/update-article', [App\Http\Controllers\HomeController::class, 'updateArticle'])->name('update-article');
//Update ebay job article
Route::post('/update-freelancer-article', [App\Http\Controllers\HomeController::class, 'updateFreelancerArticle'])->name('update-freelancer-article');
Route::post('/update-indeed-article', [App\Http\Controllers\HomeController::class, 'updateIndeedArticle'])->name('update-indeed-article');
// Edit ebay job article
Route::get('/edit-article-data/{id}', [App\Http\Controllers\HomeController::class, 'editArticle'])->name('edit-article-data');
//Edit freelancer job article
Route::get('/edit-freelancer-data/{id}', [App\Http\Controllers\HomeController::class, 'editFreelancer'])->name('edit-freelancer-data');
Route::get('/edit-indeed-data/{id}', [App\Http\Controllers\HomeController::class, 'editIndeed'])->name('edit-indeed-data');
Route::get('/user-list', [App\Http\Controllers\HomeController::class, 'userList'])->name('user-list');
Route::get('/add-user', [App\Http\Controllers\HomeController::class, 'addUser'])->name('add-user');
Route::post('/store-user', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('store-user');

Route::post('/edit-form', [App\Http\Controllers\HomeController::class, 'update']);

Route::get('/delete-article/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);

Route::post('/usersort',[App\Http\Controllers\HomeController::class, 'addDropdown']);

Route::post('/add-color',[App\Http\Controllers\HomeController::class, 'addColor']);

Route::get('/delete-color/{id}', [App\Http\Controllers\HomeController::class, 'deletecolor']);



// Route::get('/updateapp', function()
// {
//     \Artisan::call('cache:clear');
//     echo 'dump-autoload ccc complete';
// });

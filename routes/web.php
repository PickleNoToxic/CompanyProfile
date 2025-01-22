<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MasterWebController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\WorkController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/secretgate/login', 'index')->name('admin-login')->middleware('guest');
    Route::post('/secretgate/login', 'authenticate')->name('admin-authenticate');
    Route::get('/secretgate/logout', 'logout')->name('admin-logout');
});

Route::prefix('secretgate')
    ->middleware('admin')
    ->group(function () {
		Route::get('/', function () {
			return redirect()->route('admin-home');
		});
		// Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-home');
        Route::controller(AdminController::class)->group(function () {
			Route::get('/dashboard', 'index')->name('admin-home');
			Route::get('/about', 'about')->name('admin-about-section');
			Route::get('/value', 'value')->name('admin-value-section');
			Route::get('/others', 'others')->name('admin-others-section');
			Route::get('/remove-others', 'removeOthers')->name('admin-remove-others');
			Route::get('/profile', 'profile')->name('admin-profile');
			Route::put('/profile/{user}', 'updateProfile')->name('admin-profile-update');
			Route::get('/employees', 'employees')->name('admin-employees');
			Route::get('/employees/create', 'create')->name('admin-employees-create');
			Route::post('/employees', 'store')->name('admin-employees-store');
			Route::get('/employees/{user}', 'detail')->name('admin-employees-detail');
			Route::delete('/employees/{user}', 'destroy')->name('admin-employees-destroy');
			Route::put('/employees/{user}', 'update')->name('admin-employees-update');
        });

        Route::resource('/master', MasterWebController::class);
        Route::resource('/testimonials', TestimonialController::class);
        Route::resource('/contacts', ContactController::class);
        Route::resource('/sosmeds', SosialMediaController::class);
        Route::resource('/clients', ClientController::class);
        Route::resource('/companies', CompanyController::class);
        Route::resource('/values', ValueController::class);
        Route::resource('/works', WorkController::class);
        Route::resource('/directors', DirectorController::class);
});
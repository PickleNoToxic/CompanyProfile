<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CategoryFacilityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryPostController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MasterWebController;
use App\Http\Controllers\OurGalleryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\TestimonialController;
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
    Route::get('/', 'index')->name('home');
    Route::get('/programs', 'programs')->name('programs');
    Route::get('/posts', 'posts')->name('posts');
    Route::get('/posts/{post:slug}', 'post')->name('post');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::get('/our-galleries', 'galleries')->name('galleries');
    Route::get('/orders', 'orders')->name('orders');
    Route::get('/facilities', 'facilities')->name('facilities');
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

        Route::resource('/benefits', BenefitController::class);
        Route::resource('/statistiks', StatistikController::class);
        Route::resource('/heroes', HeroController::class);
        Route::resource('/master', MasterWebController::class);
        Route::resource('/testimonials', TestimonialController::class);
        Route::resource('/galleries', OurGalleryController::class);
        Route::resource('/contacts', ContactController::class);
        Route::resource('/sosmeds', SosialMediaController::class);
        Route::resource('/partners', PartnerController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/post-galleries', GalleryPostController::class);
        Route::resource('/programs', ProgramController::class);
        Route::resource('/facility/categories', CategoryFacilityController::class);
        Route::resource('/facility/facilities', FacilityController::class);
        Route::resource('/faqs', FaqController::class);
});
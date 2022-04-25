<?php

// dashboard
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\CompanyController as DashboardCompanyController;
use App\Http\Controllers\Dashboard\BannerController as DashboardBannerController;
use App\Http\Controllers\Dashboard\EmailController as DashboardEmailController;
use App\Http\Controllers\Dashboard\HighlightController as DashboardHighlightController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategoryController;

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CompanyController;
use App\Http\Controllers\Website\ContactController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// developer only
use Illuminate\Support\Facades\Hash;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('adm')->group(function () {
        Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard');

        Route::prefix('banner')->group(function () {
            Route::get('/', [DashboardBannerController::class, 'index'])->name('dashboard-banner');
            Route::get('cadastrar', [DashboardBannerController::class, 'create'])->name('dashboard-banner-create');
            Route::post('store', [DashboardBannerController::class, 'store'])->name('dashboard-banner-store');
            Route::get('editar/{id}', [DashboardBannerController::class, 'edit'])->name('dashboard-banner-edit');
            Route::post('update/{id}', [DashboardBannerController::class, 'update'])->name('dashboard-banner-update');
            Route::get('delete/{id}', [DashboardBannerController::class, 'destroy'])->name('dashboard-banner-destroy');
        });

        Route::prefix('empresa')->group(function () {
            Route::get('/', [DashboardCompanyController::class, 'index'])->name('dashboard-company');
            Route::get('cadastrar', [DashboardCompanyController::class, 'create'])->name('dashboard-company-create');
            Route::post('store', [DashboardCompanyController::class, 'store'])->name('dashboard-company-store');
            Route::get('editar/{id}', [DashboardCompanyController::class, 'edit'])->name('dashboard-company-edit');
            Route::post('update/{id}', [DashboardCompanyController::class, 'update'])->name('dashboard-company-update');
            Route::get('delete/{id}', [DashboardCompanyController::class, 'destroy'])->name('dashboard-company-destroy');
            Route::get('search', [DashboardCompanyController::class, 'search'])->name('dashboard-company-search');
        });

        Route::prefix('categoria')->group(function () {
            Route::get('/', [DashboardCategoryController::class, 'index'])->name('dashboard-category');
            Route::get('cadastrar', [DashboardCategoryController::class, 'create'])->name('dashboard-category-create');
            Route::post('store', [DashboardCategoryController::class, 'store'])->name('dashboard-category-store');
            Route::get('editar/{id}', [DashboardCategoryController::class, 'edit'])->name('dashboard-category-edit');
            Route::post('update/{id}', [DashboardCategoryController::class, 'update'])->name('dashboard-category-update');
            Route::get('delete/{id}', [DashboardCategoryController::class, 'destroy'])->name('dashboard-category-destroy');
            Route::get('search', [DashboardCategoryController::class, 'search'])->name('dashboard-category-search');
        });

        Route::prefix('email')->group(function () {
            Route::get('/', [DashboardEmailController::class, 'index'])->name('dashboard-email');
            Route::get('cadastrar', [DashboardEmailController::class, 'create'])->name('dashboard-email-create');
            Route::post('store', [DashboardEmailController::class, 'store'])->name('dashboard-email-store');
            Route::get('editar/{id}', [DashboardEmailController::class, 'edit'])->name('dashboard-email-edit');
            Route::post('update/{id}', [DashboardEmailController::class, 'update'])->name('dashboard-email-update');
            Route::get('delete/{id}', [DashboardEmailController::class, 'destroy'])->name('dashboard-email-destroy');
            Route::get('ler/{id}', [DashboardEmailController::class, 'show'])->name('dashboard-email-show');
            Route::get('rascunho', [DashboardEmailController::class, 'sketch'])->name('dashboard-email-sketch');
            Route::get('lixeira', [DashboardEmailController::class, 'trash'])->name('dashboard-email-trash');
            Route::get('enviados', [DashboardEmailController::class, 'send'])->name('dashboard-email-send');
            Route::get('filtro/{filter}', [DashboardEmailController::class, 'filter'])->name('dashboard-email-filter');
        });

        Route::prefix('destaques')->group(function () {
            Route::get('/', [DashboardHighlightController::class, 'index'])->name('dashboard-highlight');
            Route::get('cadastrar', [DashboardHighlightController::class, 'create'])->name('dashboard-highlight-create');
            Route::post('store', [DashboardHighlightController::class, 'store'])->name('dashboard-highlight-store');
            Route::get('editar/{id}', [DashboardHighlightController::class, 'edit'])->name('dashboard-highlight-edit');
            Route::post('update/{id}', [DashboardHighlightController::class, 'update'])->name('dashboard-highlight-update');
            Route::get('delete/{id}', [DashboardHighlightController::class, 'destroy'])->name('dashboard-highlight-destroy');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [DashboardUserController::class, 'index'])->name('dashboard-user');
            Route::get('cadastrar', [DashboardUserController::class, 'create'])->name('dashboard-user-create');
            Route::post('store', [DashboardUserController::class, 'store'])->name('dashboard-user-store');
            Route::get('editar/{id}', [DashboardUserController::class, 'edit'])->name('dashboard-user-edit');
            Route::post('update/{id}', [DashboardUserController::class, 'update'])->name('dashboard-user-update');
            Route::get('delete/{id}', [DashboardUserController::class, 'destroy'])->name('dashboard-user-destroy');
        });
    });
});

Route::prefix('/')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('website-home');

    Route::prefix('empresas')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company');
        Route::get('/{category}/{name}', CompanyController::class, 'show')->name('company-show');
    });

    Route::prefix('contato')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact');
        Route::post('/', [ContactController::class, 'store'])->name('contact-store');
    });
});


// developer only
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/password/{pass}', function ($pass) {

    $password = Hash::make($pass);

    return response($password);
});

Route::get('/welcome', function () {
    return view('welcome');
});

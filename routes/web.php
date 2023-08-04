<?php

use App\Http\Controllers\Admin\ManageUser;
use App\Http\Controllers\Admin\Config;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DaftarPasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Migrasi;
use App\Http\Controllers\PasienAntreanController;
use App\Http\Controllers\PasienRecordController;
use App\Http\Controllers\Student\BioStudent;
use App\Http\Controllers\User\Setting;
use App\Models\PasienAntrean;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
// Route::get('/login', function () {
//     return Inertia::render('auth/login');
//   })->name('login');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', function () {
        return Inertia::render('HomeView');
    })->name('dashboard');

    Route::get('/tables', function () {
        return Inertia::render('TablesView');
    })->name('tables');
    Route::get('/forms', function () {
        return Inertia::render('FormsView');
    })->name('forms');
    Route::get('/ui', function () {
        return Inertia::render('UiView');
    })->name('ui');
    Route::get('/responsive', function () {
        return Inertia::render('ResponsiveView');
    })->name('responsive');
    Route::get('/error', function () {
        return Inertia::render('ErrorView');
    })->name('error');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', function () {
        return Inertia::render('ProfileView');
    })->name('profile');

    Route::controller(ManageUser::class)->group(function () {
        Route::get('/users/list', 'list')->name('users.list');
        Route::post('/user/store', 'store')->name('user.store');
    });
    Route::controller(Config::class)->group(function () {
        Route::get('/config', 'index')->name('config');
        Route::get('/config/sidemenu', 'sideMenu')->name('config.sideMenu');
        Route::get('/config/sidemenu/store', 'sideMenuStore')->name('config.sideMenuStore');
    });
    Route::controller(DaftarPasienController::class)->group(function () {
        Route::get('/pasien/list', 'index')->name('pasien.list');
        Route::post('/pasien/store', 'store')->name('pasien.store');
    });
    Route::controller(PasienAntreanController::class)->group(function () {
        Route::get('/antrean/list', 'index')->name('antrean.list');
        Route::get('/antrean/store', 'store')->name('antrean.store');
        Route::get('/antrean/panggil', 'panggil')->name('antrean.panggil');
        Route::post('/antrean/destroy', 'destroy')->name('antrean.destroy');
    });
    Route::controller(PasienRecordController::class)->group(function () {
        Route::get('/pemeriksaan/list', 'index')->name('pemeriksaan.list');
        Route::post('/pemeriksaan/store', 'store')->name('pemeriksaan.store');
        Route::post('/pemeriksaan/delete', 'delete')->name('pemeriksaan.delete');
    });
});

require __DIR__ . '/auth.php';

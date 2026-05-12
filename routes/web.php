<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('homepage');
});

Route::get('/Home',[App\Http\Controllers\SiteController::class,'index' ])->name('homepage');
Route::get('/About',[App\Http\Controllers\SiteController::class,'about' ])->name('details');
Route::get('/Artist-Listing',[App\Http\Controllers\SiteController::class,'show_artistlist' ])->name('artists');
Route::get('/Music-Listing',[App\Http\Controllers\SiteController::class,'song_data' ])->name('musics');

/*<!--Extra pages--!>*/
Route::get('/Policy',[App\Http\Controllers\SiteController::class,'policy' ])->name('policy');
Route::get('/Mission&Vission',[App\Http\Controllers\SiteController::class,'vission' ])->name('mission/vission');
/*<END>*/

/*<!--- Genres----!>*/
Route::get('/Dance',[App\Http\Controllers\SiteController::class,'genre_drumstep' ])->name('dance');
Route::get('/orchestral',[App\Http\Controllers\SiteController::class,'genre_orchestral' ])->name('orchestral');
Route::get('/lofi',[App\Http\Controllers\SiteController::class,'genre_lofi' ])->name('lofi');
Route::get('/drums&bass',[App\Http\Controllers\SiteController::class,'genre_drumsnbass' ])->name('drumsnbass');
Route::get('/Future Bass',[App\Http\Controllers\SiteController::class,'genre_futurebass' ])->name('futurebass');
/*<END>*/

/*<!--Contact--!>*/
Route::post('/contact-sent',[App\Http\Controllers\SiteController::class,'query' ])->name('concern');
/*<END>*/

/*<!--Artist Information (READMORE)--!>*/
Route::get('/artist-information/{id}',[App\Http\Controllers\SiteController::class,'artist_profile' ])->name('artist_info');
Route::get('/artist-view',[App\Http\Controllers\SiteController::class,'artist_profile_view' ])->name('artist_view');
/*<END>*/

/*<!--Song Information (READMORE)--!>*/
Route::get('/song-information/{id}',[App\Http\Controllers\SiteController::class,'song_info' ])->name('song_info');
//Route::get('/song-information/{id}',[App\Http\Controllers\SiteController::class,'song_info_data' ])->name('song_info');
/*<END>*/

/*<!-- ADMIN PANEL (CMS) -->*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login');
    Route::post('/authenticate', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

        // Songs
        Route::get('/songs', [App\Http\Controllers\AdminController::class, 'songs'])->name('songs');
        Route::get('/song/form/{id?}', [App\Http\Controllers\AdminController::class, 'song_form'])->name('song.form');
        Route::post('/song/save/{id?}', [App\Http\Controllers\AdminController::class, 'song_save'])->name('song.save');
        Route::get('/song/delete/{id}', [App\Http\Controllers\AdminController::class, 'song_delete'])->name('song.delete');

        // Artists
        Route::get('/artists', [App\Http\Controllers\AdminController::class, 'artists'])->name('artists');
        Route::get('/artist/form/{id?}', [App\Http\Controllers\AdminController::class, 'artist_form'])->name('artist.form');
        Route::post('/artist/save/{id?}', [App\Http\Controllers\AdminController::class, 'artist_save'])->name('artist.save');
        Route::get('/artist/delete/{id}', [App\Http\Controllers\AdminController::class, 'artist_delete'])->name('artist.delete');
    });
});
/*<END>*/


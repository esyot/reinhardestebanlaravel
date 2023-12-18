<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
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

//index
Route::get('/', [SongController::class, 'songs'])->name('songs');

//View all songs
Route::get('/songs', [SongController::class, 'songs'])->name('songs');

//View all artist
Route::get('/artists', [ArtistController::class, 'artists'])->name('artists');

//View all albums
Route::get('/albums', [AlbumController::class, 'albums'])->name('albums');

//Create an artist
Route::get('/createArtist', [ArtistController::class, 'create'])->name('createArtist');
Route::post('/storeArtist', [ArtistController::class, 'store'])->name('storeArtist');
Route::get('/artists', [ArtistController::class, 'artists'])->name('artists');

//edit an artist
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])->name('editArtist');
Route::put('/artist/update/{id}', [ArtistController::class,'update'])->name('updateArtist');

//delete an artist
Route::get('/artist/delete/{id}', [ArtistController::class, 'delete'])->name('deleteArtist');


//Create an album
Route::get('/createAlbum', [AlbumController::class, 'create'])->name('createAlbum');
Route::post('/storeAlbum', [AlbumController::class, 'store'])->name('storeAlbum');
Route::get('/artists', [ArtistController::class, 'artists'])->name('artists');

//edit an album
Route::get('/album/edit/{id}', [AlbumController::class, 'edit'])->name('editAlbum');
Route::put('/album/update/{id}', [AlbumController::class,'update'])->name('updateAlbum');

//delete an album
Route::get('/album/delete/{id}', [AlbumController::class, 'delete'])->name('deleteAlbum');

//Create a song
Route::get('/createSong', [SongController::class, 'create'])->name('createSong');
Route::post('/storeSong', [SongController::class, 'store'])->name('storeSong');
Route::get('/songs', [SongController::class, 'songs'])->name('songs');

//edit a song
Route::get('/song/edit/{id}', [SongController::class, 'edit'])->name('editSong');
Route::put('/song/update/{id}', [SongController::class,'update'])->name('updateSong');


//Delete a song
Route::get('/song/delete/{id}', [SongController::class, 'delete'])->name('deleteSong');
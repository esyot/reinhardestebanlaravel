<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;

class AlbumController extends Controller
{
    public function albums(){
        $albums = Album::all();
        return view('albums.albums', ['albums' => $albums]);
    }

    public function create(){
        $artists = Artist::all(); 

        return view('albums.createAlbum', ['artists' => $artists]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'album_title' => 'required|string',
            'release_date' => 'required|date',
            'artist_id' => 'required|string',
        ]);
    
        Album::create([
            'album_title' => $request->input('album_title'),
            'release_date' => $request->input('release_date'),
            'artist_id' => $request->input('artist_id'),
        
        ]);
    
        return redirect('/albums')->with('message', 'Album added successfully!');
    }
    public function delete($id){

    $album = Album::find($id);

    if(!$album){
        return redirect('/albums')->with('message', 'Album not found!');

      }

    $album->delete();
    return redirect('/albums')->with('message', 'Album deleted successfully!');
    }

    public function edit($id){
        $artist = Artist::all();
        $album = Album::find($id);
        if(!$album){

            return redirect('/albums')->with('message', 'Album not found!');

        }
        return view('albums.editAlbum', [
            'album' => $album,
            'artist'=> $artist,
        ]);

    }
    public function update(Request $request, $id)
    {
    $album = Album::find($id);

    if (!$album) {
        return redirect()->route('albums.albums')->with('error', 'Album not found.');
    }

    $album->update([
        'album_title' => $request->input('album_title'),
        'release_date' => $request->input('release_date'),
        'artist_id' => $request->input('artist_id'),
     
    ]);

    return redirect()->route('albums')->with('message', 'Artist updated successfully!');
}
    

}

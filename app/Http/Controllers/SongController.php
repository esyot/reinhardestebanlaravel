<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;

class SongController extends Controller
{
  
    public function songs(){
        $songs = Song::all();
        return view('songs.songs', ['songs' => $songs]);
    }
    public function create(){

    $artists = Artist::all();
    $albums = Album::all();
    
    return view('songs.createSong',[
        'artists' => $artists,
        'albums' => $albums
    ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'artist_id' => 'required|string',
            'album_id' => 'required|string',
        ]);
    
        Song::create([
            'title' => $request->input('title'),
            'artist_id' => $request->input('artist_id'),
            'album_id' => $request->input('album_id'),
        ]);
    
        return redirect('/songs'); 
    }
    public function delete($id){

        $song = Song::find($id);

        if(!$song){

            return redirect('/songs')->with('message', 'Song not found!');
        }

        $song->delete();

        return redirect('/songs')->with('message','Song deleted successfully!');
    }

    public function edit($id){

        $song = Song::find($id);
        $artists = Artist::all();
        $albums = Album::all();
        
        if(!$song){

            return redirect('/songs')->with('error', 'Song not found!');
        }

        return view('songs.editSong',[
            'song' => $song,
            'artists' => $artists,
            'albums' => $albums,
        
        ]);

    }
    public function update(Request $request, $id)
    {
    $song = Song::find($id);

    if (!$song) {
        return redirect()->route('songs.songs')->with('error', 'Song not found.');
    }

    $song->update([
        'title' => $request->input('title'),
        'artist_id' => $request->input('artist_id'),
        'album_id' => $request->input('album_id'),
     
    ]);

    return redirect()->route('songs')->with('message', 'Song updated successfully!');
}


}

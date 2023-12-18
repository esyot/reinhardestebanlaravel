<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function artists(){
        
        $artists = Artist::all(); 

        return view('artists.artists', ['artists' => $artists]);
    }

    public function create(){
        
        return view('artists.createArtist');
    }
    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required|string',
            'address' => 'required|string',
            'date_started' => 'required|date',
        ]);
    
        Artist::create([
            'artist_name' => $request->input('artist_name'),
            'address' => $request->input('address'),
            'date_started' => $request->input('date_started'),
        ]);
    
        return redirect('/artists'); 
    }
    public function delete($id){

        $artist = Artist::find($id);

        if(!$artist){

            return redirect('/artists')->with('message', 'Artist not found!');

        }
        $artist ->delete();
            return redirect('/artists')->with('message', 'Artist deleted successfully!');

    }
    public function edit($id){

        $artist = Artist::find($id);
        if(!$artist){

            return redirect('/artists')->with('message', 'Artist not found!');

        }
        return view('artists.editArtist', ['artist' => $artist]);

    }

    public function update(Request $request, $id)
    {
    $artist = Artist::find($id);

    if (!$artist) {
        return redirect()->route('artists.artists')->with('error', 'Artist not found.');
    }

    $artist->update([
        'artist_name' => $request->input('artist_name'),
        'address' => $request->input('address'),
        'date_started' => $request->input('date_started'),
     
    ]);

    return redirect()->route('artists')->with('message', 'Artist updated successfully!');
}
      
}

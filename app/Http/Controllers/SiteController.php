<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\prospect;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $artistCount = Artist::count();
        $songCount = Song::count();

        // Get newest tracks (latest 5 songs)
        $newestSongs = Song::orderBy('created_at', 'desc')->take(5)->get();

        // Get most admired artists (latest 5 artists - you can adjust this logic)
        $admiredArtists = Artist::orderBy('created_at', 'desc')->take(5)->get();

        return view('pages.site', compact('artistCount', 'songCount', 'newestSongs', 'admiredArtists'));
    }


    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        // 
        return view('pages.client_aboutuspage');
    }


    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function artistlist()
    {
        // 
        return view('pages.client_artistlist');
    }

     /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function show_artistlist()
    {
        // 
             //
             $data= Artist::all();
             return view ('pages.client_artistlist', ['artists'=>$data]);
    }


        /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function musiclibrary()
    {
        // 
        return view('pages.client_musiclibrary');
    }


    public function genre_drumstep()
    {
        //
        return view('pages.filter.dance');
    }


    public function genre_orchestral()
    {
        //
        return view('pages.filter.orchestral');
    }


    public function genre_kawaii()
    {
        //
        return view('pages.filter.kawaii');
    }

    public function genre_lofi()
    {
        //
        return view('pages.filter.lofi');
    }

    public function genre_drumsnbass()
    {
        //
        return view('pages.filter.drumsnbass');
    }

    
    public function genre_futurebass()
    {
        //
        return view('pages.filter.futurebass');
    }


    public function policy()
    {
        //
        return view('pages.client_policy');
    }

    public function vission()
    {
        //
        return view('pages.client_vission');
    }

    public function artist_info()
    {
        //
        return view('pages.artist_readmore');
    }


        /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function song_info(Song $songs , $id)
    {
             //
             $songs= Song::find($id);
             return view ('pages.song_readmore', ['songs'=>$songs]);
    }

       /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function song_data(Song $song )
    {
             //          
             $song= Song::all();
             return view ('pages.client_musiclibrary', ['song'=>$song]);
    }

            /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
   /* public function song_info_data(Song $songs , $id)
    {
        // 
             //
             $songs= Song::all();
             return view ('pages.song_readmore', ['songs', 'artist'=>$songs]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
                //
        $message=[
            'required' => 'This credential field is required!'
        ];
        $request->validate([
            'name'=>'required',
            'mail'=>'required|email',
            'subject'=>'required',
            'message'=>'required'

        ],$message);
        prospect::create($request->all());
        return redirect()->route('homepage')
                        ->with('success', 'Your Message has been sent.');
    

    }

    public function artist_profile_view()
    {
        //
        return view('pages.artist_readmore');
    }

    public function artist_profile(artist $artist , $id)
    {
      //
      $artist = Artist::find($id);
      return view ('pages.artist_readmore')->with('artist', $artist); }

      /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function artist_profile_data(artist $artist )
    {
        // 
             //
             $artist= Artist::all();
             return view ('temp.artistlike', ['artist'=>$artist]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}

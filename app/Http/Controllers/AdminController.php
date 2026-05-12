<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // ===== LOGIN =====
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_username', $admin->username);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $admin->username . '!');
        }

        return back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_username');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    // ===== DASHBOARD =====
    public function dashboard()
    {
        $songCount = Song::count();
        $artistCount = Artist::count();
        $recentSongs = Song::latest()->take(5)->get();
        $recentArtists = Artist::latest()->take(5)->get();
        return view('admin.dashboard', compact('songCount', 'artistCount', 'recentSongs', 'recentArtists'));
    }

    // ===== SONGS CRUD =====
    public function songs()
    {
        $songs = Song::all();
        return view('admin.songs', compact('songs'));
    }

    public function song_form($id = null)
    {
        $song = $id ? Song::find($id) : null;
        return view('admin.song_form', compact('song'));
    }

    public function song_save(Request $request, $id = null)
    {
        $rules = [
            'songname' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'date_registered' => 'nullable|date',
            'info' => 'nullable|string',
        ];

        if ($id) {
            $song = Song::findOrFail($id);
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            $rules['audio'] = 'nullable|file|mimes:mp3,wav,ogg,flac|max:51200';
        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            $rules['audio'] = 'required|file|mimes:mp3,wav,ogg,flac|max:51200';
        }

        $request->validate($rules);

        $data = $request->only(['songname', 'author', 'genre', 'album', 'date_registered', 'info']);

        if ($id) {
            $song = Song::findOrFail($id);
        } else {
            $song = new Song();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('song-images'), $imageName);
            $data['image'] = $imageName;
        }

        // Handle audio upload
        if ($request->hasFile('audio')) {
            $audioFile = $request->file('audio');
            $audioName = $audioFile->getClientOriginalName();
            $audioFile->move(public_path('music'), $audioName);
            $data['audio'] = $audioName;
        }

        $song->fill($data);
        $song->save();

        $message = $id ? 'Song updated successfully!' : 'Song added successfully!';
        return redirect()->route('admin.songs')->with('success', $message);
    }

    public function song_delete($id)
    {
        $song = Song::findOrFail($id);
        // Delete associated files
        if ($song->image && file_exists(public_path('song-images/' . $song->image))) {
            unlink(public_path('song-images/' . $song->image));
        }
        if ($song->audio && file_exists(public_path('music/' . $song->audio))) {
            unlink(public_path('music/' . $song->audio));
        }
        $song->delete();
        return redirect()->route('admin.songs')->with('success', 'Song deleted successfully!');
    }

    // ===== ARTISTS CRUD =====
    public function artists()
    {
        $artists = Artist::all();
        return view('admin.artists', compact('artists'));
    }

    public function artist_form($id = null)
    {
        $artist = $id ? Artist::find($id) : null;
        return view('admin.artist_form', compact('artist'));
    }

    public function artist_save(Request $request, $id = null)
    {
        $rules = [
            'artistname' => 'required|string|max:255',
            'realname' => 'nullable|string|max:255',
            'genre' => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'info' => 'nullable|string',
        ];

        if ($id) {
            $artist = Artist::findOrFail($id);
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        $request->validate($rules);

        $data = $request->only(['artistname', 'realname', 'genre', 'nationality', 'info']);

        if ($id) {
            $artist = Artist::findOrFail($id);
        } else {
            $artist = new Artist();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('artist-profile-images'), $imageName);
            $data['image'] = $imageName;
        }

        $artist->fill($data);
        $artist->save();

        $message = $id ? 'Artist updated successfully!' : 'Artist added successfully!';
        return redirect()->route('admin.artists')->with('success', $message);
    }

    public function artist_delete($id)
    {
        $artist = Artist::findOrFail($id);
        if ($artist->image && file_exists(public_path('artist-profile-images/' . $artist->image))) {
            unlink(public_path('artist-profile-images/' . $artist->image));
        }
        $artist->delete();
        return redirect()->route('admin.artists')->with('success', 'Artist deleted successfully!');
    }
}

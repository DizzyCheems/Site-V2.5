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
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['background_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['audio'] = 'nullable|file|mimes:mp3,wav,ogg,flac|max:51200';
        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['background_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['audio'] = 'required|file|mimes:mp3,wav,ogg,flac|max:51200';
        }

        $request->validate($rules);

        $data = $request->only(['songname', 'author', 'genre', 'album', 'date_registered', 'info']);

        // Remove date_registered if empty to avoid null constraint violation
        if (empty($data['date_registered'])) {
            unset($data['date_registered']);
        }

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
        } elseif ($request->filled('image_existing')) {
            $data['image'] = basename($request->input('image_existing'));
        }

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            $bgFile = $request->file('background_image');
            $bgName = 'bg_' . time() . '_' . $bgFile->getClientOriginalName();
            $bgFile->move(public_path('song-images'), $bgName);
            $data['background_image'] = $bgName;
        } elseif ($request->filled('background_image_existing')) {
            // Use an existing file from public/assets/bg-images/
            $srcName = basename($request->input('background_image_existing'));
            $src = public_path('assets/bg-images/' . $srcName);
            if (file_exists($src)) {
                $destName = 'bg_' . time() . '_' . $srcName;
                copy($src, public_path('song-images/' . $destName));
                $data['background_image'] = $destName;
            }
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

    public function song_feature($id)
    {
        Song::query()->update(['featured' => 0]);
        Song::findOrFail($id)->update(['featured' => 1]);
        return redirect()->route('admin.songs')->with('success', 'Featured drop updated!');
    }

    public function song_delete($id)
    {
        $song = Song::findOrFail($id);
        // Delete associated files
        if ($song->image && file_exists(public_path('song-images/' . $song->image))) {
            unlink(public_path('song-images/' . $song->image));
        }
        if ($song->background_image && file_exists(public_path('song-images/' . $song->background_image))) {
            unlink(public_path('song-images/' . $song->background_image));
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
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['background_img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['secondbackground_img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['background_img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
            $rules['secondbackground_img'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:102400';
        }

        $request->validate($rules);

        $data = $request->only(['artistname', 'realname', 'genre', 'nationality', 'info']);

        if ($id) {
            $artist = Artist::findOrFail($id);
        } else {
            $artist = new Artist();
        }

        // Handle profile image upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('artist-profile-images'), $imageName);
            $data['image'] = $imageName;
        }

        // Handle background image 1 upload
        if ($request->hasFile('background_img')) {
            $bgFile = $request->file('background_img');
            $bgName = 'bg1_' . time() . '_' . $bgFile->getClientOriginalName();
            $bgFile->move(public_path('artist-profile-images'), $bgName);
            $data['background_img'] = $bgName;
        }

        // Handle background image 2 upload
        if ($request->hasFile('secondbackground_img')) {
            $bg2File = $request->file('secondbackground_img');
            $bg2Name = 'bg2_' . time() . '_' . $bg2File->getClientOriginalName();
            $bg2File->move(public_path('artist-profile-images'), $bg2Name);
            $data['secondbackground_img'] = $bg2Name;
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
        if ($artist->background_img && file_exists(public_path('artist-profile-images/' . $artist->background_img))) {
            unlink(public_path('artist-profile-images/' . $artist->background_img));
        }
        if ($artist->secondbackground_img && file_exists(public_path('artist-profile-images/' . $artist->secondbackground_img))) {
            unlink(public_path('artist-profile-images/' . $artist->secondbackground_img));
        }
        $artist->delete();
        return redirect()->route('admin.artists')->with('success', 'Artist deleted successfully!');
    }

    // ===== VIBES (file-based, no DB) =====
    private function vibesList()
    {
        return [
            'electric' => ['name' => 'Electric', 'desc' => 'High energy & hard-hitting beats'],
            'liquid'   => ['name' => 'Liquid',   'desc' => 'Smooth, melodic & atmospheric'],
            'cosmic'   => ['name' => 'Cosmic',   'desc' => 'Cinematic, ambient & deep'],
        ];
    }

    public function vibes()
    {
        $vibes = $this->vibesList();
        return view('admin.vibes', compact('vibes'));
    }

    public function vibe_form($slug)
    {
        $vibes = $this->vibesList();
        if (!isset($vibes[$slug])) abort(404);
        $vibe = array_merge(['slug' => $slug], $vibes[$slug]);
        return view('admin.vibe_form', compact('vibe'));
    }

    public function vibe_save(Request $request, $slug)
    {
        $vibes = $this->vibesList();
        if (!isset($vibes[$slug])) abort(404);

        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:102400']);

        $file = $request->file('image');
        $ext  = strtolower($file->getClientOriginalExtension());

        // Remove any existing vibe image for this slug
        foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $e) {
            $old = public_path('assets/vibes/' . $slug . '.' . $e);
            if (file_exists($old)) unlink($old);
        }

        $file->move(public_path('assets/vibes'), $slug . '.' . $ext);

        return redirect()->route('admin.vibes')->with('success', $vibes[$slug]['name'] . ' vibe image updated!');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InstagramAccount;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.social.instagram-data');
    }

    public function uploadStory()
    {
        // Logika untuk meng-handle tombol "Upload Story"

        return view('dashboard.social.upload-story');
    }

    public function uploadFeed()
    {
        // Logika untuk meng-handle tombol "Upload Feed"

        return view('dashboard.social.upload-feed');
    }

    public function storeStory(Request $request)
    {
        // Validasi request
        $request->validate([
            'story_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload story
        if ($request->hasFile('story_image')) {
            $image = $request->file('story_image');
            $path = Storage::disk('public')->putFile('stories', $image);

            // Simpan path story ke database atau lakukan logika lainnya

            return redirect()->back()->withSuccess('Story uploaded successfully.');
        }

        return redirect()->back()->withErrors('Failed to upload story.');
    }

    public function storeFeed(Request $request)
    {
        // Validasi request
        $request->validate([
            'feed_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required',
        ]);

        // Proses upload feed
        if ($request->hasFile('feed_image')) {
            $image = $request->file('feed_image');
            $path = Storage::disk('public')->putFile('feeds', $image);

            // Simpan path feed dan caption ke database atau lakukan logika lainnya

            return redirect()->back()->withSuccess('Feed uploaded successfully.');
        }

        return redirect()->back()->withErrors('Failed to upload feed.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InstagramAccount $instagramAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstagramAccount $instagramAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstagramAccount $instagramAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstagramAccount $instagramAccount)
    {
        //
    }

    public function redirectToInstagram()
    {
        return Socialite::driver('facebook')->scopes([
            'instagram_basic',
            'pages_show_list',
            'instagram_manage_comments',
            'pages_read_engagement',
            'pages_read_user_content',
        ])->redirect();
    }

    public function handleInstagramCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Cek apakah pengguna sudah terhubung dengan akun Instagram sebelumnya
        $existingAccount = InstagramAccount::where('user_id', auth()->id())->first();

        if ($existingAccount) {
            // Jika sudah terhubung, update informasi akun Instagram
            $existingAccount->instagram_id = $user->id;
            $existingAccount->access_token = $user->token;
            $existingAccount->expires_at = now()->addDays(30); // Atur jangka waktu penyimpanan

            $existingAccount->save();
        } else {
            // Jika belum terhubung, buat entri baru
            InstagramAccount::create([
                'user_id' => auth()->id(),
                'instagram_id' => $user->id,
                'access_token' => $user->token,
                'expires_at' => now()->addDays(30), // Atur jangka waktu penyimpanan
            ]);
        }

        return view('dashboard.social.instagram-data')->with('user', $user);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use Illuminate\Support\Facades\Storage;


class CustomizationController extends Controller
{
    public function edit()
    {
        $user_id = auth()->user()->id;
        $customization = Customization::where('user_id', $user_id)->first();

        if (!$customization) {
            $customization = Customization::create([
                'user_id' => $user_id,
                'title' => 'Default Title',
                'about' => 'Default About',
                'display_preview_class' => '',
                'display_preview_bg' => '',
                'display_preview_font' => '',
            ]);
        }

        return view('customization.edit', compact('customization'));
    }

    public function update(Request $request)
{
    $request->validate([
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $customization = Customization::where('user_id', auth()->user()->id)->firstOrFail();

    // Handle banner update
    if ($request->hasFile('banner')) {
        // Delete old banner if exists
        if ($customization->banner) {
            Storage::disk('public')->delete($customization->banner);
        }

        // Upload new banner
        $bannerPath = $request->file('banner')->store('banners', 'public');
        $customization->banner = $bannerPath;
    }

    // Handle profile update
    if ($request->hasFile('profile')) {
        // Delete old profile if exists
        if ($customization->profile) {
            Storage::disk('public')->delete($customization->profile);
        }

        // Upload new profile
        $profilePath = $request->file('profile')->store('profiles', 'public');
        $customization->profile = $profilePath;
    }

    // Update other fields
    $customization->title = $request->input('title_input', $customization->title);
    $customization->about = $request->input('about_input', $customization->about);
    $customization->display_preview_class = $request->input('display_preview_class', $customization->display_preview_class);
    $customization->display_preview_bg = $request->input('display_preview_bg', $customization->display_preview_bg);
    $customization->display_preview_font = $request->input('display_preview_font', $customization->display_preview_font);
    $customization->display_preview_fc = $request->input('display_preview_fc', $customization->display_preview_fc);
    $customization->save();

    return redirect()->route('home');
}
}

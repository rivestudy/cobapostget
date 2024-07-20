<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;

class CustomizationController extends Controller
{
    public function edit()
    {
        $user_id = auth()->user()->id;
        $customization = Customization::where('user_id', $user_id)->first();

        // If no customization exists, create a new one
        if (!$customization) {
            $customization = Customization::create([
                'user_id' => $user_id,
                'title' => 'Default Title',
                'about' => 'Default About',
                'display_preview_class' => '',
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

        $bannerPath = $request->file('banner') ? $request->file('banner')->store('banners', 'public') : null;
        $profilePath = $request->file('profile') ? $request->file('profile')->store('profiles', 'public') : null;

        $customization->update([
            'banner' => $bannerPath,
            'profile' => $profilePath,
            'title' => $request->input('title_input', $customization->title),
            'about' => $request->input('about_input', $customization->about),
            'display_preview_class' => $request->input('display_preview_class', $customization->display_preview_class),
        ]);

        return redirect()->route('home');
    }
}

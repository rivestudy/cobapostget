<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use App\Models\LinkButton;
use App\Models\SocialButton;
use Illuminate\Support\Facades\Storage;


class CustomizationController extends Controller
{
    public function edit()
{
    $user_id = auth()->user()->id;
    $customization = Customization::where('user_id', $user_id)->first();
    $socialButtons = SocialButton::where('user_id', $user_id)->get();
    $linkButtons = LinkButton::where('user_id', $user_id)->get();

    if (!$customization) {
        $customization = Customization::create([
            'slug' => '',
            'user_id' => $user_id,
            'banner' => 'banners/default.png',
            'profile' => 'banners/default.png',
            'title' => 'Title',
            'about' => 'About goes here',
            'display_preview_class' => 'no-scrollbar overflow-y-auto displayPreview  my-auto h-full mb-0 w-full flex-grow-1 rounded-b-2xl bg-white',
            'display_preview_bg' => 'background-image: linear-gradient(to right top, rgb(203, 213, 224), rgb(255, 255, 255)); color: black',
            'display_btn_prop' => 'abtnboxsvg1',
            'display_btn_style' => 'fill1="000000" fill0="transparent"',
        ]);
    }

    return view('customization.edit', [
        'customization' => $customization,
        'socialButtons' => $socialButtons,
        'linkButtons' => $linkButtons,
    ]);
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
        if ($customization->banner) {
            Storage::disk('public')->delete($customization->banner);
        }

        $bannerPath = $request->file('banner')->store('banners', 'public');
        $customization->banner = $bannerPath;
    }

    // Handle profile update
    if ($request->hasFile('profile')) {
        if ($customization->profile) {
            Storage::disk('public')->delete($customization->profile);
        }

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $customization->profile = $profilePath;
    }

    // Update other fields
    $customization->slug = $request->input('slug_input', $customization->slug);
    $customization->title = $request->input('title_input', $customization->title);
    $customization->about = $request->input('about_input', $customization->about);
    $customization->display_preview_class = $request->input('display_preview_class', $customization->display_preview_class);
    $customization->display_preview_bg = $request->input('display_preview_bg', $customization->display_preview_bg);
    $customization->display_btn_style = $request->input('display_btn_style', $customization->display_btn_style);
    $customization->display_btn_prop = $request->input('display_btn_prop', $customization->display_btn_prop);
    $customization->save();

    // Handle social buttons update
    SocialButton::where('user_id', auth()->user()->id)->delete();
    if ($request->has('socialButtons')) {
        foreach ($request->input('socialButtons') as $socialButton) {
            SocialButton::create([
                'user_id' => auth()->user()->id,
                'url' => $socialButton['url'],
                'icon' => $socialButton['icon'],
            ]);
        }
    }

    // Handle link buttons update
    LinkButton::where('user_id', auth()->user()->id)->delete();
    if ($request->has('linkButtons')) {
        foreach ($request->input('linkButtons') as $linkButton) {
            LinkButton::create([
                'user_id' => auth()->user()->id,
                'url' => $linkButton['url'],
                'text' => $linkButton['text'],
            ]);
        }
    }

    return redirect()->route('home');
}

}

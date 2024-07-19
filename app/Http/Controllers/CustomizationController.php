<?php
// app/Http/Controllers/CustomizationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;

class CustomizationController extends Controller
{
    public function create()
    {
        return view('customization.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'about' => 'required|string',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $bannerPath = $request->file('banner') ? $request->file('banner')->store('banners', 'public') : null;
    $profilePath = $request->file('profile') ? $request->file('profile')->store('profiles', 'public') : null;

    Customization::create([
        'user_id' => $request->user()->id,
        'title' => $request->input('title', 'Title'),
        'about' => $request->input('about', 'About goes here'),
        'banner' => $bannerPath,
        'profile' => $profilePath,
        'display_preview_class' => $request->input('display_preview_class', ''),
    ]);

    return redirect()->route('home');
}

}


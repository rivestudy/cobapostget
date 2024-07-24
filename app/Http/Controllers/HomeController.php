<?php
// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customization;
use App\Models\LinkButton;
use App\Models\SocialButton;

class HomeController extends Controller
{
    public function index()
    {
        $customizations = Customization::where('user_id', Auth::id())->first();
        $socialButtons = SocialButton::where('user_id', Auth::id())->get();
        $linkButtons = LinkButton::where('user_id', Auth::id())->get();

        return view('home', compact('customizations', 'socialButtons', 'linkButtons'));
    }
}

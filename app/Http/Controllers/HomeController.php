<?php
// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customization;

class HomeController extends Controller
{
    public function index()
    {
        $customizations = Customization::where('user_id', Auth::id())->first();

        return view('home', compact('customizations'));
    }
}

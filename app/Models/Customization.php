<?php
// app/Models/Customization.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_preview',
        'about_preview',
        'banner',
        'profile',
        'display_preview_class',
    ];
}



<?php
// app/Models/SocialButton.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialButton extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'url', 'icon'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

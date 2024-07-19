<?php

// app/Models/LinkButton.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkButton extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'text', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Add fields to be mass assignable
    protected $fillable = [
        'name',
        'description',
        'link',
        'image', // Add any other fields as needed
    ];
}

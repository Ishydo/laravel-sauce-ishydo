<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * name
 * description
 */
class Stuff extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'description'];

}

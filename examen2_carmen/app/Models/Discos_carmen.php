<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discos_carmen extends Model
{
    use HasFactory;
    protected $fillable=['titulo','autor','precio'];
}

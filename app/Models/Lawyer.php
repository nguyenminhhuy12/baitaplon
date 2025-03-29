<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lawyer extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','bar_associantion','specialization'];

    
}

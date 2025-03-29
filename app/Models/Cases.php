<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cases extends Model
{
    use HasFactory;
    protected $fillable = ['lawer_id','case_number','title','description','status'];

    public function lawer()
    {
        return $this->belongsTo(Lawyer::class);
    }

}

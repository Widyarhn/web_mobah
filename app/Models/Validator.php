<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'validator';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gabah extends Model
{
    use HasFactory;

    protected $table = "gabah";
    protected $guarded = [''];
    

    public function pemilik()
    {
        return $this->belongsTo("App\Models\Pemilik", "id_pemilik", "id");
    }
}

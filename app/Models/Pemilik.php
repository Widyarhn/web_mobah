<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;
    public $table = "pemilik";

    protected $guarded = [''];


    public function gabah(){
        return $this->belongsTo("App\Models\Gabah", "id", "id_pemilik");
    }

}

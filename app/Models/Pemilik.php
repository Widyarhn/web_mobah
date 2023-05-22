<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gabah;

class Pemilik extends Model
{
    use HasFactory;
    public $table = "pemilik";

    protected $guarded = [''];


    public function gabah(){
        return $this->belongsTo(Gabah::class, "id", "id_pemilik");
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = "pemilik";
    protected $guarded = [];

    public function gabah()
    {
        return $this->hasMany(Gabah::class, "id_pemilik", "id");
    }
}

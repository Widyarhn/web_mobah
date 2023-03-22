<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RoleSpatie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends RoleSpatie
{
    use HasFactory;


    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];
}

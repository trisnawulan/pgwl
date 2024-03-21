<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory; //pengujian atau pengembangan.

    protected $table = 'table_points'; //menentukan nama tabel yang terkait

    protected $fillable = [ //ntuk menentukan atribut-atribut model yang dapat diisi secara massal
        'name',
        'description',
        'geom',
    ];

}

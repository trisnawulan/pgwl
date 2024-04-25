<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Points extends Model
{
    use HasFactory; //pengujian atau pengembangan.

    protected $table = 'table_points'; //menentukan nama tabel yang terkait untuk interaksi dengan database

    protected $fillable = [ //menentukan atribut-atribut model yang dapat diisi secara massal
        'name',
        'description',
        'geom',
    ];

    public function points()
    {
        return $this->select(DB::raw('id, name, description, ST_AsGeoJSON(geom) as geom, created_at, updated_at'))->get();
    }

}

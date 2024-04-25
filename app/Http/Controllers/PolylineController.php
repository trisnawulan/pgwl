<?php

namespace App\Http\Controllers;

use App\Models\Polylines;
use Illuminate\Http\Request;

class PolylineController extends Controller
{
    public function __construct()
    {
        $this->polyline = new Polylines();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polylines = $this->polyline->polylines(); //memanggil fuction points di model.
        //dd($points); // cek data
        foreach($polylines as $p){ //perulangan
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom), //mengubah string json jadi variabel php agar mudah dibaca.
                'properties'=> [
                    'name' => $p->name,
                    'description'=> $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
                ];
        }


        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]); //menampilkan atau ngambil data dari points dalam format json
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            "name" => "required",
            "geom" => "required"
        ],
        [
            "name.required" => "Name is required",
            "geom.required" => "Geometry is required"
        ]);

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "geom" => $request->geom
        ];

        //create polyline
        if(!$this->polyline->create($data)){
            return redirect()->back()->with('error', 'Failed to create Polyline');
        }

        //redirect to map
        return redirect()->back()->with('success', 'Polyline created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

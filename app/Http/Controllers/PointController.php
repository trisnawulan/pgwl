<?php

namespace App\Http\Controllers;

use App\Models\Points;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct()
    {
        $this->point = new Points();
    }
    /**
     * Display a listing of the resource.
     */
    public function index() //menampilkan seluruh
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //membuat data
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //memasukkan data ke database
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

        //create point
        if(!$this->point->create($data)){
            return redirect()->back()->with('error', 'Failed to create point');
        }



        //redirect to map
        return redirect()->back()->with('success', 'Point created successfully');

        //dd($data); //dd untuk debug data apakah sesuai dengan input

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

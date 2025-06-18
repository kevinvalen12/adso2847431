<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::paginate(10);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name'        => ['required', 'string'],
            'image'       => ['required', 'image'],
            'kind'        => ['required', 'string'],
            'weight'      => ['required', 'numeric'],
            'age'         => ['required', 'numeric'],
            'breed'       => ['required', 'string'],
            'location'    => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        if ($validated){
            if($request->hasFile('image')){
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }

        $pet = new Pet;
        $pet->name = $request->name;
        $pet->image = $image;
        $pet->kind = $request->kind;
        $pet->weight = $request->weight;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->location = $request->location;
        $pet->description = $request->description;
        $pet->status = 0;

        if($pet->save()){
            return redirect('pets')->with('message', 'Thes pet: '.$pet->name.' was successfully added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}

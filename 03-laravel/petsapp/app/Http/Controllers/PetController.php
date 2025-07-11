<?php

namespace App\Http\Controllers;

use App\Models\PET;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        $pets = Pet::paginate(10);
        //dd($users->toArray());
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
          $validated = $request->validate([
            'name' => ['required'],
            'image'  => ['nullable',  'image'],
            'kind'    => ['required'],
            'weight' => ['required'],
            'age'     => ['required'],
            'breed'     => ['required'],
            'location'     => ['required'],
            'description'  => ['required'],
            // 'status'     => ['required'],
        ]);
     $image = 'no-image.png';

        if($validated) {
            //dd($request->all());
            if($request->hasFile('image')) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $image);
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
            // $pet->status = $request->status;

            if($pet->save()) {
                return redirect('pets')->with('message', 'The pet: '.$pet->name.' was successfully added!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        // dd($user->toArray());
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
          $validated = $request->validate([
            'name' => ['required'],
            'kind'  => ['required', 'string'],
            'weight'    => ['required'],
            'age' => ['required'],
            'breed'     => ['required'],
            'location'     => ['required'],
            'description'     => ['required'],
        ]);
        if($validated) {
            //dd($request->all());
            if($request->hasFile('image')) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('image'), $image);
                if($request->originimage != 'no-image.png'){
                    unlink(public_path('images/').$request->originimage);
                }
            } else {
                $image = $request->originimage;
            }

            $pet->name = $request->name;
            $pet->image = $image;
            $pet->kind = $request->kind;
            $pet->weight = $request->weight;
            $pet->age = $request->age;
            $pet->breed = $request->breed;
            $pet->location = $request->location;
            $pet->description = $request->description;
            if($pet->save()) {
                return redirect('pets')->with('message', 'The pet: '.$pet->name.' was successfully edited!');
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        // if($user->delete()){
        //     if($user->photo != 'no-photo.png'){
        //         unlink(public_path('images/').$user->photo);
        //     }
        //     return redirect('users')->with('message','the user: '.$user->fullname. 'was successfully deleted!');
        // }
        return redirect('pets')->with('message', 'The pet: ' . $pet->name . 'was successfully deleted!');
    }

    public function search(Request $request){
        $pets = Pet::names($request->q)->paginate(10);
        return view('pets.search')->with('pets',$pets);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils= Profile::all();
        return view('GProfile.profil', [
           'profils' => $profils,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profil =  new Profile();
        $profil->libelle = 'Etudiant';
        $profil->save();
        return view('GProfile.profil',['profil'=> $profil]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);
        $profil = new Profile();
        $profil->libelle =$request['libelle'];
        $profil->save();
        return to_route('profile.index')->with('success','Profil save with success');

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
        $profil =  new Profile();
        return view('GProfile.editprofile',['profil'=> $profil->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profil =  new Profile();
        $np = $profil->find($id);

        $request->validate([
            'libelle' => 'required',
        ]);


        $np->libelle =$request['libelle'];
        $np->save();
        return to_route('profile.index')->with('update','Profil edited with success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profil =  new Profile();
        $profil->find($id)->delete();
        return to_route('profile.index')->with("danger","Profil deleted");
    }
}

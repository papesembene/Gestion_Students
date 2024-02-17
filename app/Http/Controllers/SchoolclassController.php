<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Profile;

use App\Models\Student;
use Illuminate\Http\Request;

class SchoolclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('GSchoolclass.classe',[
            'classes' => Classe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('GSchoolclass.Addclasse', [
            'classes' =>new Classe(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasseRequest $request, Classe $classe)
    {
        //$classe = new Classe();
        //$classe->create($request->validated());
        $classe->nomclasse = $request['nomclasse'];
        $classe->save();
        return redirect()->route('class.index')->with('success','schoolclass save in success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::all()->where('id_classe',$id);
        return view('GSchoolclass.detailclasse',['details'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$classe =  ;
        return view('GSchoolclass.Addclasse',[
            'classes'=>  Classe::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClasseRequest $request, string $id)
    {
        $classe =  new Classe();
        $nc = $classe->find($id);
        $nc->nomclasse =$request['nomclasse'];
        $nc->save();
        //$nc->update($request->validated());
        return redirect()->route('class.index')->with('update','Schoolclass updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classe =  new Classe();
        $classe->find($id)->delete();
        return to_route('class.index')->with("danger","Schoolclass deleted");
    }
}

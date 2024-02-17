<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\StudentRequest;
use App\Imports\StudentImport;
use App\Models\Classe;
use App\Models\Student;
use App\Models\StudentExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {

          $students = Student::query()->orderBy('created_at','desc');
        if ($lastname = $request->validated('lastname')){
            $students = $students->where('lastname','like',"%{$lastname}%");
        }
        return view('Gstudent.student',

            [   'students'=>$students->paginate(10),
                'input'=>$request->validated()
            ]
        );
        //
        //return view('Gstudent.student',['students'=>$students]);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        $file = $request->file('file');
        Excel::import(new StudentImport(), $file);
        return redirect()->route('student.index')->with('import', 'Data imported successfully.');
    }
    public function downloadexcel()
    {
        return Excel::download(new StudentExport(), 'studentlist.xlsx');
    }
    public function create()
    {
        $students = new Student();
        $classes = Classe::all();
        return view('Gstudent.AddStudent',['students'=>$students,'classes'=>$classes] );

    }

    public function store(StudentRequest $request,Student $student)
    {
        //$student->email = strtolower($request['firstname'][0]).strtolower($request['lastname']).'@itsn.com';
        //$student->create($request->all());
        $student->firstname = $request['firstname'];
        $student->lastname = $request['lastname'];
        $filename = time() .'.' . $request->image->extension();
        $request->image->storeAs('public/images',$filename);
        $student->image = $filename;
        $student->telephone = $request['telephone'];
        $student->birthday = $request['birthday'];
        $student->lieu = $request['lieu'];
        $student->email = strtolower($request['firstname'][0]).strtolower($request['lastname']).'@itsn.com';
        $student->save();
        $student->classes()->attach($request->input('id_classe',), ['annee_academique' => $request->input('annee_academique') ] );
        return redirect()->route('student.index')->with('success','student save with sucess');
        /*User::create(
            [
                'name'=> $request['firstname'],
                'email'=>strtolower($request['firstname'][0]).strtolower($request['lastname']).'@myapp.com',
                'password' => Hash::make('passer'),
                'profile_id' => 1,
            ]
        );*/

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('Gstudent.showStudent',['student'=>$student]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = new Student();
        $students = $student->find($id);
        $classes = Classe::all();
        return view('Gstudent.AddStudent',['students'=>$students,'classes'=>$classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request,  string $id)
    {
        /*$request->validate(
            [
                'firstname'=>'required',
                'lastname'=>'required',
                'className'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'telephone'=>'required',
                'birthday'=>'required',
                'lieu'=>'required',
                'annee_academique'=>'required'

            ]
        );*/

        $student = Student::find($id);
        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            if ($student->image) {
                Storage::delete('public/images/' . $student->image);
            }
        } else {
            $imageName = $student->image;
        }
        //$student->update($request->all());
        $student->firstname = $request['firstname'];
        $student->lastname = $request['lastname'];
        $student->telephone = $request['telephone'];
        $student->image = $imageName;
        $student->email = strtolower($request['firstname'][0]).strtolower($request['lastname']).'@itsn.com';
        $student->save();
        $student->classes()->attach($request->input('className',), ['annee_academique' => $request->input('annee_academique')]);
        /*User::update(
            [
                'name'=> $student['firstname'],
                'email'=>strtolower($student['firstname'][0]).strtolower($student['lastname']).'@myapp.com',
                'password' => Hash::make('passer'),
                'profile_id' => 1,
            ]
        );*/
        return redirect()->route('student.index')->with('update','Student updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student =  new Student();
        Storage::delete('public/images/' . $student->image);
        $student->find($id)->delete();
        //$student->classes()->detach($request->input('className',), ['annee_academique' => $request->input('annee_academique')]);
        return redirect()->route('student.index')->with("danger","Student deleted");
    }


}


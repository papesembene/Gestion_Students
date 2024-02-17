<?php
namespace App\Models;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
class StudentExport implements FromCollection,WithHeadings
{
    public function headings():array {
        return [
            'id',
            'firstname',
            'lastname',
            'email',
            'telephone',
            'birthday',
            'lieu',
            'classe',
        ];
    }
    public function collection() {
        $st =  Student::with('classes')->get();
        //return $st->all()->where('classes',$st->classes);
        // Student::all();
      $data = $st->map(function($student){
          return[
              'id'=>$student->id,
              'firstname'=>$student->firstname,
              'lastname'=>$student->lastname,
              'email'=>$student->email,
              'telephone'=>$student->telephone,
              'birthday'=>$student->birthday,
              'lieu'=>$student->lieu,
              'classe'=>$student->classes->pluck('nomclasse')->implode(''),

          ];
      });
      return $data;
    }
}

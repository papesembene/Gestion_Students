<?php
namespace App\Imports;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Student_Classe;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\File;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Storage;

class StudentImport implements ToModel,WithHeadingRow,WithValidation
{


    /**
     * @param array $row
     * @return void
     */
    #[\Override] public function model(array $row):void
    {
        $classe = new Classe();
        $classe->nomclasse = $row["nomclasse"];
        $classe->save();
        $filename =$row['image'];
        $path = Storage::putFile('public/images',new File($filename));

         //$imagepath = Storage::copy($row["image"],'public/images/'.basename($row["image"]));
        //dd($row['email']);
        // Code de création du modèle à partir des données de la ligne $row
        $student= new Student();
            $student->lastname = $row["lastname"];
            $student->firstname = $row["firstname"];
            //$row["image"]->storeAs('public/images',$filename);
            //$imagestore = Storage::disk('public')->putFileAs('images',new File($imagepath));
            $student->image= $path;
            $student->email =$row["email"];//strtolower($row["firstname"][0]).strtolower($row["lastname"])."@gmail.com";
            $student->telephone = $row["telephone"];
            $student->birthday = $row["birthday"];
            $student->lieu =$row["lieu"];
            $student->save();

            $pivot = new Student_Classe([
                "annee_academique"=>$row["annee_academique"],
                "id_classe" => $classe->id,
                "id_student"=>$student->id,
            ]);
            $pivot->save();
        //$student->classes()->attach($student->id,["annee_academique"=>$row["annee_academique"]]);
    }


    #[\Override] public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            //'email' =>Rule::unique('students','email'),
        ];
    }
}

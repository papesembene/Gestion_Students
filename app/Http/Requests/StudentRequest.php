<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

                    'firstname'=>'required',
                    'lastname'=>'required',
                    'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'telephone'=>'required',
                    'birthday'=>'required|date',
                    'lieu'=>'required',
                    'id_classe'=>'required',
                    'annee_academique'=>'required',
                    'email'=>'email|unique|nullable'
                ];

    }
}

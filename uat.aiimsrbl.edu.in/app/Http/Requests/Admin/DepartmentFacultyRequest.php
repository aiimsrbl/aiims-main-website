<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DepartmentFaculty;


class DepartmentFacultyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $editId = request()->get('edit_id');

        $rules = [
            'department'    => "required",
            'designation'    => "required",
            'type'          => "required",
            'rank'          => "required",
            'name'          => "required|min:2|max:100",
            //'email'         => "email|min:2|max:100|unique:department_faculties,email,".$editId.",id",
            //'phone'         => "required|numeric|digits_between:10,13",
            'status'        => "required",
            'image'          => "mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024)
        ];

        if(request()->get('phone')){
            $rules['phone'] = 'numeric|digits_between:10,13';
        }

        if(request()->get('email')){
            $rules['email'] = "email|min:2|max:100|unique:department_faculties,email,".$editId.",id";
        }

        if(request()->file('image'))
        {
           $rules['image'] = "mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
        }

        return $rules;
    }

    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['department', 'name', 'email', 'status','phone','image','facebook','twitter','linkedin','type','designation','rank','description']);

        return $data;
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentActivityRequest extends FormRequest
{   
    private $messages  = [];
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
        $custom_error_msg = [];

        $rules = [
            'department'    => "required",
            'status'        => "required",
        ];

        $post = request()->all();

        foreach ($post['temp'] as $index => $val)
        {
            if(request()->has("title_$index"))
            {  
                $rules["title_$index"]                      = "required|min:2|max:100";
                $this->messages["title_$index.required"]    = "The title field is required";
                $this->messages["title_$index.min"]         = "The title must be at least :min characters";
                $this->messages["title_$index.max"]         = "The title can have max :max  characters";
                
                if(request()->get('edit_id') && !$val){

                    $rules["image_$index"]  = "required|mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
    
                    $this->messages["image_$index.required"] ="The image field is required";
                    $this->messages["image_$index.mimes"] ="The image must be a file of type: gif, jpg, jpeg, png";
                    $this->messages["image_$index.max"] ="The image must not be greater than ".MAX_IMAGE_SIZE." MB."; 
                }
                else if(!request()->get('edit_id')){
                    
                    $rules["image_$index"] = "required|mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
    
                    $this->messages["image_$index.required"] ="The image field is required";
                    $this->messages["image_$index.mimes"] ="The image must be a file of type: gif, jpg, jpeg, png";
                    $this->messages["image_$index.max"] ="The image must not be greater than ".MAX_IMAGE_SIZE." MB."; 
                }
            }
        }
        return $rules;
    }

    public function messages()
    {  
        return $this->messages;
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class EventGalleryRequest extends FormRequest
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
            'event'    => "required"
        ];

        $post = request()->all();

        foreach ($post['temp'] as $index => $val)
        {   
            if(isset($post['edit_id']) && request()->has("image_$index")){

                $rules["image_$index"]  = "required|mimes:gif,jpg,jpeg,png,svg|max:".(MAX_IMAGE_SIZE*1024);

                $this->messages["image_$index.required"] ="The image field is required";
                $this->messages["image_$index.mimes"] ="The image must be a file of type: gif, jpg, jpeg, png";
                $this->messages["image_$index.max"] ="The image must not be greater than ".MAX_IMAGE_SIZE." MB."; 
            }
            else if(empty($val)){
                $rules["image_$index"] = "required|mimes:gif,jpg,jpeg,png,svg|max:".(MAX_IMAGE_SIZE*1024);

                $this->messages["image_$index.required"] ="The image field is required";
                $this->messages["image_$index.mimes"] ="The image must be a file of type: gif, jpg, jpeg, png";
                $this->messages["image_$index.max"] ="The image must not be greater than ".MAX_IMAGE_SIZE." MB."; 
            }   
        }

        return $rules;
    }

    public function messages()
    {  
        return $this->messages;
    }
}

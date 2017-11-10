<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'category_id'           => 'required',
            'duration'              => 'required|min:1',
            'required_students'     => 'required|min:1',
            'required_instructors'  => 'required|min:1'
        ];

        // update resource
        if ($this->isMethod('put'))
            return array_merge($rules, ['name' => 'required|unique:education,name,'.$this->input('id')]);

        return array_merge($rules, ['name' => 'required|unique:education']);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'Deze naam bestaat al',
        ];
    }
}
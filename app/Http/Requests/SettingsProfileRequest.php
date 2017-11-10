<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsProfileRequest extends FormRequest
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
            'name'          => 'required|max:50',
            'last_name'     => 'required|max:50',
            'email'         => 'required|max:50|email|unique:users,email,'.$this->request->all()['id'],
            'gender'        => 'required|integer|between:0,1',
        ];

        if (isset($this->request->all()['password'])) {
            $rules += ['password' => 'min:5|max:30|confirmed'];
        }

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
           'category_id'            => 'required',
           'maintenance_interval'   => 'required|min:1',
           'maintenance_duration'   => 'required|min:1',
       ];

        // update resource
        if ($this->isMethod('put')) {
            return array_merge($rules, ['name' => 'required|unique:vehicle,name,'.$this->input('id')]);
        }

        return array_merge($rules, ['name' => 'required|unique:vehicle']);
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

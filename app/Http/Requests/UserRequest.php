<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        
        return [
            'name' => 'required|min:2',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)], 
            'phone_number' => ['required', 'numeric', 'min:11', Rule::unique('users', 'phone_number')->ignore($id)],
            'password' => 'required|min:6',
        ];
    }
}

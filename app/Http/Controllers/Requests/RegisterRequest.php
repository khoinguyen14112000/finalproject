<?php
namespace App\Http\Controllers\Requests;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest{
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
        return [
            'txtEmail' => 'required',
            'txtPassword' => 'required|same:txtPassword_confirmation',
            'txtPassword_confirmation' => 'required'
        ];
    }

    /**
     * customize msg error
     * @return array
     */
    public function messages()
    {
        return [
            'txtEmail.required' => 'Vui lòng nhập email',
            'txtPassword.required' => 'Vui lòng nhập password',
            'txtPassword_confirmation.same' => 'Xác nhận password phải giống password đã nhập',
            'txtPassword_confirmation.required' => 'Vui lòng nhập xác nhận password',
        ];
    }
}

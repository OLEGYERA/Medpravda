<?php

namespace Fresh\Medpravda\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class GlobalUserRequest extends FormRequest
{
    /**
     * by Olegyera
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * by Olegyera
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $result = [];

        if ($request->isMethod('post')) {
            switch ($this->route()->getName()){
                case 'manage.forgot.login':
                case 'manage.forgot.password':
                case 'api_administration.manager.update.email':
                    $result = [
                                'email' => 'required|email|max:255'
                              ];
                    break;
                case 'api_administration.manager.verify':
                    $result = [
                        'email' => 'required|email|max:255|unique:users'
                    ];
                    break;
                case 'api_administration.manager.update.login':
                    $result = [
                        'login' => 'required|max:255'
                    ];
                    break;
            }

        }

        return $result;
    }

    public function messages()
    {
        return [
            'email.required' => 'E-mail адрес обязателен для заполнения.',
            'email.email' => 'Введен некорректный E-mail адрес.',
            'email.max' => 'E-mail адрес не может содержать более 255 символов.',
            'email.unique' => 'E-mail адрес уже зарегистрирован.',
            'login.required' => 'Логин обязателен для заполнения.',
            'login.email' => 'Введен некорректный Логин.',
            'login.max' => 'Логин не может содержать более 255 символов.',
            'login.unique' => 'Логин уже зарегистрирован.',
        ];
    }
}

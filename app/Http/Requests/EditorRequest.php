<?php

namespace Fresh\Medpravda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            switch ($this->route()->getName()){
                case 'editor_create':
                    $rules = [
                        'first_name' => ['required', 'string', 'between:4,255'],
                        'middle_name' => ['required', 'string', 'between:4,255'],
                        'last_name' => ['required', 'string', 'between:4,255'],
                        'author_img' => 'required|mimes:jpg,png,jpeg|max:5120',
                        'specialty' => ['required', 'string', 'between:4,255'],
                        'specialization' => ['between:0,255'],
                        'place' => ['string', 'between:4,255'],
                        'education_img' => 'required|mimes:jpg,png,jpeg|max:5120',
                        'about' => ['required'],
                        'experience' => ['required'],
                        'section_author' => ['required'],
                    ];
                    break;
                case 'editor_edit':

                    $rules = [
                        'first_name' => ['required', 'string', 'between:4,255'],
                        'middle_name' => ['required', 'string', 'between:4,255'],
                        'last_name' => ['required', 'string', 'between:4,255'],
                        'author_img' => 'mimes:jpg,png,jpeg|max:5120',
                        'specialty' => ['required', 'string', 'between:4,255'],
                        'specialization' => ['between:0,255'],
                        'place' => ['string', 'between:4,255'],
                        'education_img' => 'mimes:jpg,png,jpeg|max:5120',
                        'about' => ['required'],
                        'experience' => ['required'],
                        'section_author' => ['required'],
                    ];
                    break;
                default:
                    $rules = [

                    ];
                    break;
            }


        } else {
            $rules = [

            ];

        }
        return $rules;
    }

    public function messages()
    {
        return [
            'outputtime.date' => 'Поле <b>Дата публикации</b> должно быть в формате даты.',
            'template_id.required' => 'Выберите шаблон!',
        ];
    }
}

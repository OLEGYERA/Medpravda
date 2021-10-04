<?php

namespace Fresh\Medpravda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LongreadRequest extends FormRequest
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
                case 'longread_create_main':
                    $rules = [
                        'title' => ['required', 'string', 'between:4,255'],
                        'utitle' => ['required', 'string', 'between:4,255'],
                        'alias' => ['required', 'string', 'between:4,255', 'unique:longreads'],
                        'priority' => ['numeric', 'max:255'],
                        'template_id' => ['required'],
                        'outputtime' => ['date'],
                        'description' => ['max:160'],
                        'udescription' => ['max:160'],

                    ];
                    break;
                case 'longread_edit_main':
                    $rules = [
                        'title' => ['required', 'string', 'between:4,255'],
                        'utitle' => ['required', 'string', 'between:4,255'],
                        'alias' => ['required', 'string', 'between:4,255'],
                        'priority' => ['numeric', 'max:255'],
                        'outputtime' => ['date'],
                        'description' => ['max:160'],
                        'udescription' => ['max:160'],

                    ];
                    break;
                case 'longread_edit_photo':
                    $rules = [
                        'title' => ['nullable', 'string', 'between:0,255'],
                        'utitle' => ['nullable', 'string', 'between:0,255'],
                        'alt' => ['nullable', 'string', 'between:0,255'],
                        'ualt' => ['nullable', 'string', 'between:0,255'],
                        'lg_img' => 'mimes:jpg,png,jpeg|max:5120|nullable',
                        'lg_img_ua' => 'mimes:jpg,png,jpeg|max:5120|nullable',
                    ];
                    break;
                case 'longread_edit_seo':
                    $rules = [
                        'seo_title' => ['nullable', 'between:0,255'],
                        'useo_title' => ['nullable', 'between:0,255'],
                        'seo_description' => ['nullable', 'between:0,255'],
                        'useo_description' => ['nullable', 'between:0,255'],
                        'og_image' => ['nullable', 'between:0,255'],
                        'uog_image' => ['nullable', 'between:0,255'],
                        'og_title' => ['nullable', 'between:0,255'],
                        'uog_title' => ['nullable', 'between:0,255'],
                        'og_description' => ['nullable', 'between:0,255'],
                        'uog_description' => ['nullable', 'between:0,255'],
                    ];
                    break;
                case 'longread_create_template':
                case 'longread_edit_template':
                    $rules = [
                        'title' => ['required', 'between:0,255'],
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

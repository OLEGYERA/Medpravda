<?php

namespace Fresh\Medpravda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('slug', ['required', 'max:255', 'regex:#^[a-z0-9-]#', 'unique:ideas,slug'], function($input) {


            if($this->route()->hasParameter('greatidea')) {
                $model = $this->route()->parameter('greatidea');

                return ($model->slug !== $input->slug)  && !empty($input->slug);
            }

            return !empty($input->slug);

        });

        return $validator;

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if ('greatidea.update' == $this->route()->getName() || 'greatidea.store' == $this->route()->getName()) {
            $rules = [
                'title'=>'required|string|between:4,255',
                'slug'=>['required', 'max:255', 'regex:#^[a-z0-9-]#'],
                'url'=>['required', 'max:255', 'regex:#^[a-z0-9-\/]#'],
                'utm_source'=>['required', 'max:255', 'regex:#^[a-zA-Z0-9-_\(\)]#'],
                'utm_medium'=>['required', 'max:255', 'regex:#^[a-zA-Z0-9-_\(\)]#'],
                'utm_campaign'=>['nullable', 'max:255', 'regex:#^[a-zA-Z0-9-_\(\)]#'],
                'utm_content'=>['nullable', 'max:255', 'regex:#^[a-zA-Z0-9-_\(\)]#'],
                'transition'=>'required|numeric|between:1,48000',
                'banner_click'=>'nullable|numeric|between:1,48000',
                'start'=>'required|date',
                'stop'=>'nullable|date|after_or_equal:start',
                'approved' => 'boolean|nullable',
                'banner' => 'boolean|nullable',
                'banners' => 'numeric|between:1,10|nullable|required_if:banner,1',
                'scenario'=>'nullable|numeric|between:1,10',

            ];
            return $rules;
        }

        return [
            //
        ];
    }
}

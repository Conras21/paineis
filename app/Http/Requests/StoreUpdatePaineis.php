<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePaineis extends FormRequest
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
        $id = $this->segment(2);

        $rules = [
                    'dsc_nome_painel' => [
                                'required',
                                'min:3',
                                'max:160',
                                //'unique:paineis, title, {$id}, id',
                                Rule::unique('paineis')->ignore($id),
                    ],
                    'dsc_descricao_painel' => ['min:5', 'max: 10000'],
                    'dsc_link_painel' => ['required'],
                    'image' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }

        return $rules;
    }
}

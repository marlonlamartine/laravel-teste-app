<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:1000',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image' => 'image|nullable'
        ];
    }

    public function messages()
    {
        return 
        [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Informe um nome com mais de 3 caracteres',
            'price.required' => 'O preço é obrigatório para o cadastro',
            'description.required' => 'O campo descrição é obrigatório para o cadastro'
        ];
    }
}

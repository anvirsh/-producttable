<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
     
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
			  'name' => 'required|min:10',
			  'article' =>'required|unique:products|min:2|regex:/^[a-zA-Z0-9]+$/u',//только латинские буквы и цфры 
			 //'article' =>'regex:/^[a-zA-Z0-9\'._-]+$/u',//латинские буквы и цфры и тире и подчёркивание
			  'data' => 'json',
        ];
    }
	
	 public function messages() //перевод ошибок
    {
        return [
            'name.min' => 'В поле наименование необходимо минимум 10 символов!',
            'article.min' => 'В поле артикул необходимо минимум 2 символа!',
		    'article.required' => 'Укажите Артикул!',
            'article.unique' => 'Такой Артикул уже существует!',
			'article.regex' => 'Артикул имеет не допустимые символы!',
			'data.json' => 'Сбой!',
        ];
    }
}

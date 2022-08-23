<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePutProductRequest extends FormRequest
{
	//если не использовать $redirect то ошибка, "маршрут требует метод get, а не put" когда на update  попадем
    protected $redirect = 'products/create';// \Request::path()так не запишишь
	 
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
		$massRd = explode('/',\Request::path());//\Request::path() выдаёт напр. 'products/6'
		$this->redirect = 'products/'.$massRd[1].'/edit';
       	return [
			  'name' =>  'required|min:10',			 
			  'article' =>'required|min:2|regex:/^[a-zA-Z0-9]+$/u',//только латинские буквы и цфры 
			 //'article' =>'regex:/^[a-zA-Z0-9\'._-]+$/u',//латинские буквы и цфры и тире и подчёркивание
			  'data' => 'json',
	      ]; 
    }
	
	public function messages() //перевод ошибок
    {
        return [
            'name.min' => 'В поле Наименование нужно минимум 10 символов!',
            'article.min' => 'В поле Артикул нужно минимум 2 символа!',
		    'article.required' => 'Укажите Артикул!',
			'article.regex' => 'Артикул имеет не допустимые символы!',
			'data.json' => 'Сбой!',
        ];
    }
	
}

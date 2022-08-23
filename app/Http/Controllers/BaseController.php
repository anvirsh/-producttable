<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
   	public function isAdmin(){// Получаем роль из файла конфига (можно из мидлевара сделать)
		$adminuser = config('products.admin_user');
		if($adminuser == 'admin'){return true;}
		return false;
	}
	
	
  /////////////////////////////////////////////////////////////////////////////////////////////////
  //Метод для функционала cмены ролей admina и usera (т.к. не используем на сайте полноценную регистрацию)
    public function flagadmin($flag){//$flag вроде boolin но строка(как в get.) через сеть получится напр.'false'
	   $rol = 'admin';
	   if(($flag == false)||($flag == 'false')){$rol = 'user';}
	   $fileConf =	config_path() . '/products.php';
	   $contents = file_get_contents($fileConf);// получаем содержимое файла настроек
	   $posCf = mb_strpos($contents,'admin_user');//нашли позицию начала ключа 'admin_user'
	   $erstCont = mb_substr($contents,0,$posCf-1);//Считали шапку файла там нужны коменты
	   $gotovo = $erstCont."'admin_user' => '".$rol."' ];"; //добавили нужную настройку $rol
	   file_put_contents($fileConf, $gotovo);//записали в файл
	     return Redirect::route('products')->with('messeg', 'Роль изменена.');
    }
	
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;//свои классы валидации
use App\Http\Requests\UpdatePutProductRequest;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Request;//-это ошб. Undefined property: Illuminate\Support\Facades\Request::$name 
//use Illuminate\Http\Request;//пока используем этот
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
Use App\Jobs\SendEmailCreateProductJob;


class DashboardController extends BaseController
{
  
    public function index()
    {
		$admin = $this->isAdmin();//В родителськом узнаём роль
		if($admin == true){$products = Product::all();}//admin
		if($admin == false){$products = Product::available()->orderBy('created_at')->get();}//user
		foreach ($products as $product){
		  if($product->status == 'available'){$product->status = "Доступен";}else{$product->status = "Не доступен";}
		}
        return Inertia::render('Products/Index',['products' => $products, 'admin'=> $admin]);
    }
    
	
	
    public function create()
    {
		$adresemail = config('products.email');//email из конфига берём
        return Inertia::render('Products/Create',['adresemail'=>$adresemail]);
    }
  
  
  
    public function store(StoreProductRequest $request)
    {
		// валидация вынесена в класс StoreProductRequest
		$request->data = $request->tdata;//Из за ограничения Vue вместо data поле tdata на фронте		
        $newMod = new Product();
		$newMod->name = $request->name;
		$newMod->article = $request->article;
		$newMod->status = $request->status;
		$newMod->data = $request->data;
		$newMod->save();
		if($request->sendmail === true){//***в->очередь оповещение***
	      SendEmailCreateProductJob::dispatch('Создан продукт - '.$newMod->name); 
		}		
        return Redirect::route('products')->with('success', 'Товар создан.');
    }

 
    public function edit(Product $product)
    {		
	  $adresemail = config('products.email');//email из конфига берём
	  $admin = $this->isAdmin();//В родителськом узнаём роль
       return Inertia::render('Products/Edit',['product' => $product,'admin'=>$admin, 'adresemail'=>$adresemail]);
    }

    
    public function update(UpdatePutProductRequest $request, $id)
    {   // валидация вынесена в класс UpdatePutProductRequest
    	$request->data = $request->tdata;//Из за ограничения Vue вместо data поле tdata на фронте
        $product = Product::find($id);
		$product->name = $request->name;
		$product->article = $request->article;
		$product->status = $request->status;
		$product->data = $request->data;
		$product->save();
         return Inertia::render('Products/Edit',['product' => $product])->with('success', 'Обновлено.');
        //return Redirect::route('products')->with('success', 'Товар создан.'); - так теряется 'success'???
    }

  
    public function destroy(Product $product)
    {
        //$product->delete();// - мягкое удаление т.е. отметит в базе флаг но всё останется
        $product->forceDelete(); //реальное удаление 
        return Redirect::route('products')->with('success', 'Товар - '.$product->name.' удалён.');
    }
		
}


<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Notifications\EmailCreateProductMessage;

class SendEmailCreateProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $product = "-"; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($newProduct)
    {
       $this->product = $newProduct;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {    //Залогиненого юзера нет в приложении    
		$toUser = new User();//отправку через модель делаем
		$toUser->email =  config('products.email');//email из конфига берём
		$toUser->notify(new EmailCreateProductMessage($this->product));
				
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailCreateProductMessage extends Notification
{
    use Queueable;

	protected $product = "-";
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newProduct)
    {
       $this->product = $newProduct;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
		            ->subject('Create product.')
		            ->greeting('Оповещение - Notification!')
                    ->line('Новый товар - '.$this->product.' создан.')
                    ->action('Подробнее', url('/'))
                    ->line('Спасибо что используете наше приложение!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
	

}

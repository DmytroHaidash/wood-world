<?php

namespace App\Mail;

use App\Models\Catalog\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreate extends Mailable
{
	use SerializesModels;
	/**
	 * @var Order
	 */
	public $order;
    public $email;

	/**
	 * Create a new message instance.
	 *
	 * @param Order $order
	 */
    public function __construct(Order $order, $email)
    {
        $this->order = $order;
        $this->email = $email;
    }

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this
            ->to($this->email)
			->subject('Заказ с сайта')
			->view('mail.order');
	}
}

<?php

namespace App\Mail;

use App\Models\Catalog\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AskQuestion extends Mailable
{
    use SerializesModels;

    /**
     * @var Request
     */
    public $data;
    /**
     * @var Product
     */
    public $product;

    public $email;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param Product $product
     * @param string $email
     */
    public function __construct($data, Product $product, $email)
    {
        $this->data = (object)$data;
        $this->product = $product;
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
			->subject('Вопрос по товару')
			->view('mail.question');
	}
}

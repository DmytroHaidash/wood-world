<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreate;
use App\Models\Catalog\Order;
use App\Models\Catalog\Product;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Product $product): RedirectResponse
    {
        $exists = Order::where('contact', $request->get('contact'))
            ->where('product_id', $product->id)
            ->count();

        if (!$exists) {
            $attributes = $request->only('name', 'contact', 'phone', 'message');
            $attributes['price'] = $product->price;

            $order = $product->orders()->create($attributes);

            Mail::send(new OrderCreate($order, config('app.admin_email')));
            Mail::send(new OrderCreate($order, config('app.admin_email_2')));
        }

        session()->put('product', $product);
        session()->put('message', 'pages.thanks.product.' . ($exists ? 'exists' : 'added'));

        return redirect()->route('app.thanks');
    }
}

<h4>Заказчик:</h4>

<p>{{ $order->name }}, {{ $order->phone }}, {{ $order->contact }}</p>

<h4>Товар:</h4>
<p>
    <a href="{{ route('app.catalog.show', $order->product) }}" target="_blank">{{ $order->product->title }}</a>
</p>

@if ($order->message)
    <h4>Сообщение:</h4>
    <p>{{ $order->message }}</p>
@endif

<br>
<p>-----<br>{{ $order->created_at->formatLocalized('%d %B %Y') }}</p>

<h4>Контакт:</h4>

<p>{{ $data->user->name }}, {{ $data->phone }} {{ $data->user->contact }}</p>

<h4>Товар:</h4>
<p>
    <a href="{{ route('app.catalog.show', $product) }}" target="_blank">{{ $product->title }}</a>
</p>

@if ($data->message)
    <h4>Сообщение:</h4>
    <p>{{ $data->message }}</p>
@endif

<br>
<p>-----<br>{{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</p>
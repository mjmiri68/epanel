<h2>Your Cart</h2>
<ul>
    @foreach ($cart as $item)
        <li>Product ID: {{ $item }}</li>
    @endforeach
</ul>
<a href="{{ route('checkout') }}" class="px-4 py-2 bg-green-500 text-white rounded">Proceed to Checkout</a>

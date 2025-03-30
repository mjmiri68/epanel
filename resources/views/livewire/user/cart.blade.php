<div>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Product</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>

                            <td class="py-2 px-4 border-b">
                                ${{ number_format($item->price, 2) }}</td>
                            <td class="py-2 px-4 border-b">
                                <button wire:click="removeFromCart({{ $item->id }})"
                                    class="text-red-500 hover:text-red-700">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>{{$totalPrice}}</h1>
            <div class="mt-4">
                <button wire:click="updateCart" class="bg-blue-500 text-white py-2 px-4 rounded">Update Cart</button>
                <button wire:click="$emit('checkout')"
                    class="bg-green-500 text-white py-2 px-4 rounded">Checkout</button>
            </div>
        @endif
    </div>
</div>
<script>
    window.addEventListener('checkout', event => {
        // Redirect to the checkout page
        window.location.href = '/checkout';
    });
</script>

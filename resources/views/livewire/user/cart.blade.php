<div>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="min-w-full bg-white shadow overflow-y-auto border-b border-gray-400 dark:border-gray-700 sm:rounded-lg rounded-lg">
                <thead class="dark:bg-gray-800 dark:border-gray-700 text-gray-500 dark:text-gray-400 ">
                    <tr>
                        <th class="py-2 px-4 ">Product</th>
                        <th class="py-2 px-4 ">Price</th>
                        <th class="py-2 px-4 ">Actions</th>
                    </tr>
                </thead>
                <tbody class="dark:bg-gray-700 dark:border-gray-700 text-gray-500 dark:text-gray-400 text-center">
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="py-2 px-4 ">{{ $item->name }}</td>

                            <td class="py-2 px-4 ">
                                ${{ number_format($item->price, 2) }}</td>
                            <td class="py-2 px-4 ">
                                <button wire:click="removeFromCart({{ $item->id }})" class="text-red-500 hover:text-red-700 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256">
                                        <g fill="#e90000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M10,2l-1,1h-4c-0.6,0 -1,0.4 -1,1c0,0.6 0.4,1 1,1h2h10h2c0.6,0 1,-0.4 1,-1c0,-0.6 -0.4,-1 -1,-1h-4l-1,-1zM5,7v13c0,1.1 0.9,2 2,2h10c1.1,0 2,-0.9 2,-2v-13zM9,9c0.6,0 1,0.4 1,1v9c0,0.6 -0.4,1 -1,1c-0.6,0 -1,-0.4 -1,-1v-9c0,-0.6 0.4,-1 1,-1zM15,9c0.6,0 1,0.4 1,1v9c0,0.6 -0.4,1 -1,1c-0.6,0 -1,-0.4 -1,-1v-9c0,-0.6 0.4,-1 1,-1z"></path></g></g>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="py-2 px-4 border-t"></th>
                        <td class="py-2 px-4 border-t border-r">Total</th>
                        <td class="py-2 px-4 border-t">${{$totalPrice}}</th>
                    </tr>
                </tbody>
            </table>
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

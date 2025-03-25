<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $id }}">
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded cursor-pointer">Buy Now</button>
</form>
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table-fixed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr :key="{{$product->id}}">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"
                            wire:click="addToCart({{ $product->id }})">Add to Cart</flux:button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

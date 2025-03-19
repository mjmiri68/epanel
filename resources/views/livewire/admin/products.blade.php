<div class="container mx-auto p-4">
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    @if ($isEdit)
        <h3>Edit Product</h3>
    @else
        <h3>Create Product</h3>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
        <div class="flex space-x-4">
            <div class="flex-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" placeholder="GamePass 1 month"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" id="slug" wire:model="slug" placeholder="GamePass-1-month"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('slug')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" wire:model="price" placeholder="1.5"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('price')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category_id" wire:model="category_id"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition ease-in-out duration-200">
            {{ $isEdit ? 'Update' : 'Create' }}
        </button>
    </form>

    <h3 class="mt-6 text-xl font-semibold">Product List</h3>
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-2">Name</th>
                <th class="border border-gray-300 p-2">Slug</th>
                <th class="border border-gray-300 p-2">Price</th>
                <th class="border border-gray-300 p-2">Category</th>
                <th class="border border-gray-300 p-2">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach ($products as $product)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $product->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $product->slug }}</td>
                    <td class="border border-gray-300 p-2">{{ $product->price }}</td>
                    <td class="border border-gray-300 p-2">{{ $product->category->name }}</td>
                    <td class="border border-gray-300 p-2">
                        <button wire:click="edit({{ $product->id }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">Edit</button>
                        <button wire:click="delete({{ $product->id }})"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>

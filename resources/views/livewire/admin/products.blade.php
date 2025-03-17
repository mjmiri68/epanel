<div>
    @if (session()->has('message'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Success</p>
            <p class="text-sm">{{ session('message') }}</p>
        </div>
    @endif

    <div class="mb-3">
        <button wire:click="create" class="btn btn-primary">Add Product</button>
    </div>

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
    <table class="min-w-full mt-4 table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left text-sm text-gray-600">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach ($products as $product)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">{{ $product->slug }}</td>
                    <td class="px-4 py-2">{{ $product->price }}</td>
                    <td class="px-4 py-2">{{ $product->category->name }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="edit({{ $product->id }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">Edit</button>
                        <button wire:click="delete({{ $product->id }})"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

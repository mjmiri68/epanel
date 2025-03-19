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
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Categories Mangement</h2>
        <div class="mb-4">
            <input type="text" wire:model="name" placeholder="Name"
                class="mt-1 block border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3">
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
            @if ($isEditing)
                <button wire:click="update" class="mt-2 bg-green-500 text-white p-2 rounded">
                    Edit
                </button>
            @else
                <button wire:click="create" class="mt-2 bg-blue-500 text-white p-2 rounded">
                    Add
                </button>
            @endif
        </div>
        <table class="w-full border-collapse border border-gray-200">
             <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">#</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Slug</th>
                    <th class="border border-gray-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $category->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $category->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $category->slug }}</td>
                        <td class="border border-gray-300 p-2">
                            <button wire:click="edit({{ $category->id }})"
                                class="bg-yellow-500 text-white p-1 rounded">Edit</button>
                            <button wire:confirm="Are you sure?" wire:click="delete({{ $category->id }})"
                                class="bg-red-500 text-white p-1 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>

</div>

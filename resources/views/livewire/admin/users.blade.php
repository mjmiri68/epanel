<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search User"
            class="mt-1 block w-1/3 border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button wire:click="showCreateForm" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
    </div>

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

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-2">Name</th>
                <th class="border border-gray-300 p-2">Email</th>
                <th class="border border-gray-300 p-2">Admin</th>
                <th class="border border-gray-300 p-2">Status</th>
                <th class="border border-gray-300 p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                    <td class="border border-gray-300 p-2">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td class="border border-gray-300 p-2">{{ $user->status ? 'Active' : 'Deactive' }}</td>
                    <td class="border border-gray-300 p-2">
                        <button wire:click="showEditForm({{ $user->id }})"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="confirmDelete({{ $user->id }})"
                            class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right mt-5 content-between">
        {{ $users->links() }}
    </div>
    @if ($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg w-1/3">
                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                <h2 class="text-lg mb-4">{{ $userId ? 'Edit User' : 'Add User' }}</h2>
                <input type="text" wire:model="name" placeholder="Name" class="border p-2 w-full mb-2">
                <input type="email" wire:model="email" placeholder="Email" class="border p-2 w-full mb-2">
                <input type="password" wire:model="password" placeholder="Password" class="border p-2 w-full mb-2">

                <div class="flex items-center mb-2">
                    <input type="checkbox" wire:model="is_admin" class="mr-2">
                    <label>Admin?</label>
                </div>

                <div class="flex items-center mb-2">
                    <input type="checkbox" wire:model="status" class="mr-2">
                    <label>Active?</label>
                </div>

                <div class="mt-4 flex justify-end">
                    <button wire:click="$set('showModal', false)"
                        class="mr-2 px-4 py-2 bg-gray-400 text-white rounded">Cansel</button>
                    <button wire:click="saveUser" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                </div>
            </div>
        </div>
    @endif

    @if ($confirmingDelete)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg">
                <p>Are you sure you want to delete this user?</p>
                <div class="mt-4 flex justify-end">
                    <button wire:click="$set('confirmingDelete', false)"
                        class="mr-2 px-4 py-2 bg-gray-400 text-white rounded">Cansel</button>
                    <button wire:click="deleteUser" class="px-4 py-2 bg-red-500 text-white rounded">Yes,I'm
                        Sure</button>
                </div>
            </div>
        </div>
    @endif
</div>

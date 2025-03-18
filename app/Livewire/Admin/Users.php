<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

    public $name, $email, $password, $is_admin = false, $status = false;
    public $userId;
    public $search = '';
    public $showModal = false;
    public $confirmingDelete = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|min:6',
            'is_admin' => 'boolean',
            'status' => 'boolean',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.users', compact('users'));
    }

    public function showCreateForm()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function showEditForm($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = (bool) $user->is_admin;
        $this->status = (bool) $user->status;
        $this->showModal = true;
    }

    public function saveUser()
    {
        $this->validate();

        $user = $this->userId ? User::find($this->userId) : new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->is_admin = $this->is_admin;
        $user->status = $this->status;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        session()->flash('message', $this->userId ? 'Update User' : 'Create User');

        $this->resetFields();
        $this->showModal = false;
    }

    public function confirmDelete($id)
    {
        $this->userId = $id;
        $this->confirmingDelete = true;
    }

    public function deleteUser()
    {
        if ($this->userId) {
            User::find($this->userId)->delete();
            session()->flash('message', 'Delete User');
        }
        $this->confirmingDelete = false;
    }

    private function resetFields()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->is_admin = false;
        $this->status = false;
    }

}

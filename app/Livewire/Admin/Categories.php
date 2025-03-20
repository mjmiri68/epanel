<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $isEditing = false;
    public $name, $categoryId;
    protected $listeners = ['deleteCategory'];

    public function render()
    {
        $categories = Category::paginate(20);
        return view('livewire.admin.categories', [
            'categories' => $categories,
            'isEditing' => $this->isEditing,
        ]);
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create(['name' => $this->name, 'slug' => \Str::slug($this->name),'created_by' => auth()->id(),'updated_by' => auth()->id()]);

        $this->resetFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->update(['name' => $this->name]);

        $this->resetFields();
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->categoryId = null;
        $this->isEditing = false;
    }
}

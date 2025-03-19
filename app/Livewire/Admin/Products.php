<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Products extends Component
{
    public $products, $name, $slug, $description, $price, $category_id, $product_id;
    public $isEdit = false; // Flag for edit mode

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ];

    public function mount()
    {
        $this->products = Product::paginate(20);
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        $this->resetFields();
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'created_by' => auth()->id(),
        ]);

        session()->flash('message', 'Product successfully created.');
        $this->mount(); // Reload products
        $this->resetFields();
    }

    public function edit($productId)
    {
        $this->isEdit = true;
        $product = Product::findOrFail($productId);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
    }

    public function update()
    {
        $this->validate();

        $product = Product::findOrFail($this->product_id);
        $product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Product successfully updated.');
        $this->mount(); // Reload products
        $this->resetFields();
    }

    public function delete($productId)
    {
        Product::findOrFail($productId)->delete();
        session()->flash('message', 'Product successfully deleted.');
        $this->mount(); // Reload products
    }

    private function resetFields()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = '';
    }
}

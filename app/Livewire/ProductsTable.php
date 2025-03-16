<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Category', 'category.name')
                ->sortable(),

            Column::make('Price', 'price')
                ->sortable(),

            Column::make('Quantity', 'quantity')
                ->sortable(),

            Column::make('Actions')
                ->format(function($value, $row, Column $column) {
                    return view('components.add-to-cart', ['product' => $row]);
                }),
        ];
    }

    public function addToCart($productId)
    {
        // اینجا لاجیک اضافه کردن به سبد خرید را پیاده‌سازی کن
        session()->push('cart', $productId);
        $this->dispatchBrowserEvent('cart-updated');
    }
}

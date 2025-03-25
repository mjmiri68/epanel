<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\LinkColumn;
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

            Column::make('Quantity', 'stock')
                ->sortable(),

            Column::make('Action','id')
                ->format(fn($value, $row, Column $column) => view('user.cart', ['id' => $row->id]))
        ];
    }

    public function addToCart($productId)
    {
        session()->push('cart', $productId);
        $this->dispatchBrowserEvent('cart-updated');
    }
}

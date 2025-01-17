<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput = ''; 

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    { 
        $this->category = $category;
        $this->updateProductList();
    }  

    public function updated($propertyName)
    {
        $this->updateProductList();
    }

    public function updateProductList()
    {
        $query = Product::where('category_id', $this->category->id)
            ->where('status', '0');
        
        if (!empty($this->brandInputs)) {
            $query->whereIn('brand', $this->brandInputs);
        }
        
        if (!empty($this->priceInput)) {
            if ($this->priceInput == 'high-to-low') {
                $query->orderBy('selling_price', 'DESC');
            } elseif ($this->priceInput == 'low-to-high') {
                $query->orderBy('selling_price', 'ASC');
            }
        }

        $this->products = $query->get();
    }

    public function render()
    {
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
            
            
        ]);
    }
}






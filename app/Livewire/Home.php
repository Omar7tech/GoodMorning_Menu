<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Lazy;
use Livewire\Component;


#[Lazy]
class Home extends Component
{
    public function render()
    {
        $featuredProducts = Product::active()
            ->with(['media', 'category'])
            ->where('featured', 1)
            ->orderBy('sort', 'asc')->get();

        $categories = Category::active()
            ->orderBy('sort', 'asc')
            ->with(['addons', 'products.media', 'media'])
            ->get();

        return view('livewire.home', ['categories' => $categories , 'featuredProducts' => $featuredProducts]);
    }

    public function placeholder()
    {
        return <<<'HTML'
    <div class="flex justify-center items-center h-screen">
        <span class="loading loading-dots loading-xl text-green-500"></span>
    </div>
    HTML;
    }

}

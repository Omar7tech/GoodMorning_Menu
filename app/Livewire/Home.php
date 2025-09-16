<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Lazy;
use Livewire\Component;


#[Lazy]
class Home extends Component
{
    public function render(GeneralSettings $settings)
    {
        if (!$settings->site_active) {
            return view('livewire.maintenance');
        }
        $featuredProducts = Product::active()
            ->with(['media', 'category'])
            ->where('featured', 1)
            ->orderBy('sort', 'asc')->get();

        $newProducts = Product::active()
            ->with(['media', 'category'])
            ->where('new', 1)
            ->orderBy('sort', 'asc')->get();
        $categories = Category::active()
            ->orderBy('sort', 'asc')
            ->with(['addons', 'products.media', 'media'])
            ->get();

        return view('livewire.home', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'newProducts' => $newProducts,
            'settings' => $settings,
        ]);
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

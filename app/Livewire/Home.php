<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Category::active()->with(['products' , 'addOns'])->get();
        return view('livewire.home' , ['categories' => $categories]);
    }
}

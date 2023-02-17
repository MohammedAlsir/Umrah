<?php

namespace App\Http\Livewire;

use App\Models\Tree4;
use Livewire\Component;

class Exchange extends Component
{
    public $tree4;
    public $tree4_2;

    public $selectedState = NULL;
    public function mount()
    {
        $this->tree4 = Tree4::whereBetween('tree4_code', ['120200001', '120399999'])->get();
        // $this->tree4 = Tree4::all();

        $this->tree4_2 = collect();
    }

    public function render()
    {
        return view('livewire.exchange');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->tree4_2 = Tree4::whereNotBetween('tree4_code', ['120200001', '120399999'])->where('tree4_code', '!=', $state)->get();
        }
    }
}
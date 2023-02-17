<?php

namespace App\Http\Livewire;

use App\Models\Tree4;
use Livewire\Component;



class Select extends Component
{
    public $tree4;
    public $tree4_2;

    public $selectedState = NULL;

    public function mount()
    {
        $this->tree4 = Tree4::whereNotBetween('tree4_code', ['120100001', '120199999'])->get();
        // $this->tree4 = Tree4::all();

        $this->tree4_2 = collect();
    }

    public function render()
    {
        return view('livewire.select');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->tree4_2 = Tree4::whereNotBetween('tree4_code', ['120100001', '120199999'])->where('tree4_code', '!=', $state)->get();
        }
    }
}
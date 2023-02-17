<?php

namespace App\Http\Livewire;

use App\Models\Daily_restriction;
use Livewire\Component;

class Model extends Component
{
    public $item_id_send;
    public $daily_restrictions;

    public function mount($item_id)
    {

        $this->item_id_send = $item_id;
        $this->daily_restrictions = Daily_restriction::where('registration_number', '>=', 1);
    }

    public function render()
    {
        return view('livewire.model');
    }
}
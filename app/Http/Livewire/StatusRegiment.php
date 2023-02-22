<?php

namespace App\Http\Livewire;

use App\Models\Regiment;
use Livewire\Component;

class StatusRegiment extends Component
{
    public $regiment;
    public $regiment_chose;
    public $selectedStatus = Null;

    public function mount($item)
    {

        $this->regiment  = $item;
        $this->selectedStatus = $this->regiment->status;

        // $this->process_status = ModelsProcessStatus::all();

        // $this->process_chose  = $this->process->process_status;
    }

    public function render()
    {
        return view('livewire.status-regiment');
    }

    public function updatedSelectedStatus($status)
    {
        if (!is_null($status)) {
            $this->regiment->status = $status;
            $this->regiment->save();
        }
    }
}

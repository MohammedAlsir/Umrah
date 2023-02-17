<?php

namespace App\Http\Livewire;

use App\Models\Status_process_visa;
use Livewire\Component;

class StatusVisa extends Component
{
    public $visa;
    public $visa_chose;
    public $selectedStatus = Null;


    public function mount($item)
    {

        $this->visa  = $item;
        $this->selectedStatus = $this->visa->status;

        // $this->visa_status = ModelsvisaStatus::all();

        // $this->visa_chose  = $this->visa->visa_status;
    }


    public function render()
    {
        $status = Status_process_visa::where('belongs_to', 2)->get();

        return view('livewire.status-visa', compact('status'));
    }

    public function updatedSelectedStatus($status)
    {
        if (!is_null($status)) {
            $this->visa->status = $status;
            $this->visa->save();
        }
    }
}
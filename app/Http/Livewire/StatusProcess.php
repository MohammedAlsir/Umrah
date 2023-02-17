<?php

namespace App\Http\Livewire;

use App\Models\Status_process_visa;
use Livewire\Component;

class StatusProcess extends Component
{
    public $process;
    public $process_chose;
    public $selectedStatus = Null;

    public function mount($item)
    {

        $this->process  = $item;
        $this->selectedStatus = $this->process->status_2;

        // $this->process_status = ModelsProcessStatus::all();

        // $this->process_chose  = $this->process->process_status;
    }
    public function render()
    {
        $status = Status_process_visa::orderBy('id', 'DESC')->get();

        return view('livewire.status-process', compact('status'));
    }

    public function updatedSelectedStatus($status)
    {
        if (!is_null($status)) {
            $this->process->status_2 = $status;
            $this->process->save();
        }
    }
}
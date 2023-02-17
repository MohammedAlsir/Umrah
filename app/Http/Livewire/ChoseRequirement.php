<?php

namespace App\Http\Livewire;

use App\Models\Requirement_has_processe;
use App\Models\Requirement_processe;
use Livewire\Component;

class ChoseRequirement extends Component
{

    public $requirements;
    public $chose_requirements;

    public function mount($item)
    {
        $this->requirements  =  Requirement_processe::where('type_processes_id', $item->type->id)->get();
        // $requirements  =  Requirement_process::where('id', '>', 0);

        $this->chose_requirements  =  Requirement_has_processe::where('processes_id', $item->id)->get();
        // $chose_requirements  =  requirement_has_processes::where('id', '>', 0);
    }
    public function render()
    {
        return view('livewire.chose-requirement');
    }
}
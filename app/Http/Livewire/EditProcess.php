<?php

namespace App\Http\Livewire;

use App\Models\Requirement_has_processe;
use App\Models\Requirement_processe;
use App\Models\Type_process;
use Livewire\Component;

class EditProcess extends Component
{
    public $price_type;


    public $requirements;


    // مجموع التكلفة للدولار
    public $total_dollar;



    // الاجمالي بالجنيه السوداني
    public $total_boundsd = 0;

    public $total_boundsd_type = 0;


    public $status_insurance;

    public $selectedState = NULL;


    public $process;

    public $type;


    public function mount($process, $type)
    {

        $this->type = $type;
        $this->process = $process;

        $this->requirements  =  Requirement_processe::where('type_processes_id', $this->process->type_processe_id)->get();

        $this->selectedState = $process->type_processe_id;

        $this->price_type = $process->price_type;







        // $this->total_dollar = number_format((int)$process->agreement_amount + (int)$process->insurance_amount + (int)$process->other_costs);
        // $this->total_boundsd = number_format(((int)$process->agreement_amount + (int)$process->insurance_amount + (int)$process->other_costs) * $process->dollar_price);
        // $this->total_boundsd_type = ($process->agreement_amount + $process->insurance_amount + $process->other_costs) * $process->dollar_price;
    }
    public function render()
    {
        $chose_requirements  =  Requirement_has_processe::where('processes_id', $this->process->id)->get();

        return view('livewire.edit-process', compact('chose_requirements'));

        // return view('livewire.edit-process');
    }


    public function updatedSelectedState($state)
    {
        if (isset($state) && $state != '') {
            // $this->insurance_amount = 0;

            // $this->price_type = Type_process::find($state)->price;

            // $this->status_insurance = Type_process::find($state)->status_insurance;

            $this->requirements  =  Requirement_processe::where('type_processes_id', $state)->get();
        }
    }


    public function change()
    {
        // $this->total_dollar  =  number_format((int)$this->agreement_amount + (int)$this->insurance_amount + (int)$this->other_costs);
        // $this->total_boundsd =  number_format(((int)$this->agreement_amount + (int)$this->insurance_amount + (int)$this->other_costs) * $this->process->dollar_price);
        // $this->total_boundsd_type =  ($this->agreement_amount + $this->insurance_amount + $this->other_costs) * $this->process->dollar_price;






        // $this->total_boundsd =  number_format(((int)$this->total_dollar * (int)$this->setting->dollar_price));
        // $this->total_boundsd_type =  ((int)$this->total_dollar * (int)$this->setting->dollar_price);


    }
}
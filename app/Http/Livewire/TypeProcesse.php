<?php

namespace App\Http\Livewire;

use App\Models\Requirement_processe;
use App\Models\Type_process;
use Livewire\Component;

class TypeProcesse extends Component
{

    public $type;

    public $price_type;
    public $price_type_sr;


    public $requirements;



    // مجموع التكلفة للدولار
    public $total_dollar;

    // سعر التامين


    // الاجمالي بالجنيه السوداني
    public $total_boundsd = 0;

    public $total_boundsd_type = 0;



    public $selectedState = NULL;


    public $setting;



    public function mount($type, $setting)
    {

        $this->type = $type;
        $this->setting = $setting;
    }

    public function render()
    {
        return view('livewire.type-processe');
    }


    public function updatedSelectedState($state)
    {
        if (isset($state) && $state != '') {

            $this->price_type = Type_process::find($state)->price;
            $this->price_type_sr = Type_process::find($state)->price_sr;

            // $this->status_insurance = Type_process::find($state)->status_insurance;

            $this->requirements  =  Requirement_processe::where('type_processes_id', $state)->get();
        }
    }


    public function change()
    {
        $this->total_dollar  =  $this->price_type;


        $this->total_boundsd =  number_format(((int)$this->total_dollar * (int)$this->setting->dollar_price));
        // $this->total_boundsd =  ((int)$this->total_dollar);
        $this->total_boundsd_type =  ((int)$this->total_dollar * (int)$this->setting->dollar_price);
    }
}
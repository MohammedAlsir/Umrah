<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\Daily_restriction;
use App\Models\Tree4;
use Livewire\Component;

class AgentPayment extends Component
{

    public $tree4;
    public $tree4_2;
    public $data;
    public $id_agent;


    // المدفوع
    public $paid_up = 0;
    // المتبقي
    public $residual = 0;

    public $residual_2 = 0;

    // الاجمالي
    public $Total = 0;

    public $price = 0;

    public $selectedState = NULL;


    public function mount()
    {
        $this->tree4 = Tree4::whereBetween('tree4_code', ['120100001', '120199999'])->get();
        $this->tree4_2 = collect();
    }

    public function render()
    {
        return view('livewire.agent-payment');
    }



    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->tree4_2 = Tree4::whereBetween('tree4_code', ['120200001', '120399999'])->where('tree4_code', '!=', $state)->get();
        }
        $this->Total = number_format(Daily_restriction::where('debtor', $state)->sum('price'));
        $this->residual = number_format(Daily_restriction::where('debtor', $state)->sum('price') - Daily_restriction::where('Creditor', $state)->sum('price'));
        $this->residual_2 = Daily_restriction::where('debtor', $state)->sum('price') - Daily_restriction::where('Creditor', $state)->sum('price');

        $this->paid_up = number_format(Daily_restriction::where('Creditor', $state)->sum('price'));
    }
}

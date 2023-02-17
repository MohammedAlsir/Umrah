<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use Livewire\Component;

class AddProcess extends Component
{
    // مبلغ الاتفاق
    public $agreement_amount;
    // مبلغ التأمين
    public $insurance_amount;
    // تكاليف اخرى
    public $other_costs;
    // الاجمالي بالدولار
    public $total_dollar;
    // الاجمالي بالجنيه السوداني
    public $total_boundsd;

    public $total_boundsd_type;


    public $setting;

    public function mount($setting)
    {

        $this->setting = $setting;
    }

    public function render()
    {
        return view('livewire.add-process');
    }

    public function change()
    {
        $this->total_dollar  =  number_format((int)$this->agreement_amount + (int)$this->insurance_amount + (int)$this->other_costs);
        $this->total_boundsd =  number_format(((int)$this->agreement_amount + (int)$this->insurance_amount + (int)$this->other_costs) * $this->setting->dollar_price);
        $this->total_boundsd_type =  ((int)$this->agreement_amount + (int)$this->insurance_amount + (int)$this->other_costs) * (int)$this->setting->dollar_price;
    }
}

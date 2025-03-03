<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;

class Pricing extends Component
{

    public $plans ;
    public $selectedPlan ;

    public function mount(){

        $this->plans = Plan::all();
    }

    public function selectPlan(Plan $plan)
    {
        $this->selectedPlan = $plan;
       
    }

    public function render()
    {
        return view('livewire.plans.pricing');
    }
}

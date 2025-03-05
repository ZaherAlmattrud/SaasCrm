<?php

namespace App\Livewire\Business;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;

class Register extends Component
{

    public $plans;
    public $showForm = false;
    public $selectedPlan = [];
    public $currentStep = 1;
    public $business = [];


    public function mount()
    {

        $this->plans = Plan::all();
    }

    #[On('plan-selected')]
    public function selectPlan($plan)
    {
        $this->showForm = true;
        $this->selectedPlan = $plan;
        $this->currentStep = 2;
    }

    public function validateBusiness()
    {
        $validatedBusiness = $this->validate([
            "business.name" => "required",
            "business.industry" => "required",
        ]);
    }



    public function nextStep($step)
    {

        if ($step == 3) {

            $this->validateBusiness();
            
        } elseif ($step == 'submit') {

            $validatedUser = $this->validate([
                "user.name" => "required|string|max:255",
                "user.email" => "required|string|email|max:255|unique:users,email",
                "user.password" => "required|min:8|max:60|confirmed"
            ]);
        }



        $this->currentStep = intval($step);
    }

    public function render()
    {
        return view('livewire.business.register');
    }
}

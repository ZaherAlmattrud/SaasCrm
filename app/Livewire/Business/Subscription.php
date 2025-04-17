<?php

namespace App\Livewire\Business;

use App\Models\Business;
use App\Models\Plan;
use Livewire\Component;

class Subscription extends Component
{


    public $business;
    public $plans;

    public function mount()
    {

        $this->business = Business::find(session('businessId'));
        $this->plans = Plan::all();
    }
    public function render()
    {
        return view('livewire.business.subscription');
    }

    public function selectPlan(Plan $plan)
    {

        // Create a new DateTime object with the current date and time
        $currentDateTime = new \DateTime();
        // Add 15 days to the current date
        $currentDateTime->modify('+' . $plan->trial_period_days . ' days');
        // Format the date and time as per your requirement
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $businessData = [
            "plan_id" => $plan->id,
            "expire_at" => $formattedDateTime,
        ];
        $this->business->update( $businessData);
    }
}

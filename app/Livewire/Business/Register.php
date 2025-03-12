<?php

namespace App\Livewire\Business;

use App\Models\Business;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Illuminate\Http\Request;

class Register extends Component
{

    use UsesSpamProtection;

    public $plans;
    public $showForm = false;
    public $selectedPlan = [];
    public $currentStep = 1;
    public $business = [];
    public $user = [];
    public HoneypotData $extraFields;


    public function mount(Request $request)
    {

        $this->extraFields = new HoneypotData();
        $this->plans = Plan::all();
    }

    public function addBusiness()
    {
            // Create a new DateTime object with the current date and time
            $currentDateTime = new \DateTime();
            // Add 15 days to the current date
            $currentDateTime->modify('+'.$this->selectedPlan['trial_period_days'].' days');
            // Format the date and time as per your requirement
            $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
            $businessData = [
                "name"=>$this->business['name'],
                "industry"=>$this->business['industry'],
                "plan_id"=>$this->selectedPlan['id'],
                "expire_at"=> $formattedDateTime,
            ];
            return Business::create($businessData);
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

        return  $validatedBusiness  ;
    }

    public function validateUser(){

        $validatedUser = $this->validate([
            "user.name" => "required|string|max:255",
            "user.email" => "required|string|email|max:255|unique:users,email",
            "user.password" => "required|min:8|max:60|confirmed"
        ]);

        return   $validatedUser ;

        
    }



    public function nextStep($step)
    {

        if ($step == 3) {

            $this->validateBusiness();

        } elseif ($step == 'submit') {

            $this->protectAgainstSpam(); // if is spam, will abort the request

            $validatedUser = $this->validateUser();

            $business =  $this->addBusiness();

             // Hash the password
             $hashedPassword = Hash::make($validatedUser['user']['password']);
             // Create the user
             $user = User::create([
                 'name' => $validatedUser['user']['name'],
                 'email' => $validatedUser['user']['email'],
                 'password' => $hashedPassword,
             ]);

             $user->businesses()->attach($business->id);

             $this->redirectRoute('login');

            
        }



        $this->currentStep = intval($step);
    }

    public function render()
    {
        return view('livewire.business.register');
    }
}

<?php

namespace App\Livewire\Business;

use Illuminate\Http\Request;
use Livewire\Component;

class Select extends Component
{
    public $showSelection=false;
    public $businessId;
    public $showButton = false;

    public function mount(Request $request)
    {
        if($request->selectBusiness=='true'){
            $this->showSelection=true;
        }
    }

    public function change(){
        $this->showSelection=true;
    }

    public function updatedBusinessId(Request $request){

        $request->session()->put('businessId', $this->businessId);
        $this->redirect('/dashboard'); 
    }
    
    public function render()
    {
        return view('livewire.business.select');
    }
}

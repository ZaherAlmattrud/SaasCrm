<?php

namespace App\Livewire\Business;

 
use Illuminate\Support\Facades\Auth;
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

        $businesses = Auth::user()->businesses;
        $exists = false ;
        foreach ($businesses as $business ) {

            if( $business->id == $this->businessId){
                $exists = true;
                break;
            } 
        }

        if($exists){

            $request->session()->put('businessId', $this->businessId);
            $this->redirect('/dashboard'); 
            
        }else{

            abort('403' , 'UnAuthorized');

        }
       
    }
    
    public function render()
    {
        return view('livewire.business.select');
    }
}

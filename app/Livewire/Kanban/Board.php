<?php

namespace App\Livewire\Kanban;

use App\Models\Lead;
use Livewire\Component;

class Board extends Component
{

    public $leads;
    public $data = ["new" => [], "contacted" => [], "converted" => []];
    public $statuses = ["new", "contacted", "converted"];


    public function mount()
    {

        $this->groupData();
     
    }

    public function groupData(){

        $this->reset('data') ;
        $leads = Lead::all();
        foreach ($leads as $lead) {
            $this->data[$lead->status][] = $lead;
        }

        
    }
    public function render()
    {
        return view('livewire.kanban.board');
    }

    public function updateLeadStatus($orderdData){

         

        foreach ($orderdData as $group) {

            foreach ($group['items'] as $item) {

                $group['value'] ; // status
                $item['value'] ; // lead id

                Lead::find($item['value'])->update(['status' => $group['value']]);


               
            }

            
        }

        $this->groupData();

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Result;
use Livewire\Component;
use Livewire\WithPagination;

class ResultComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function download($id)
    {
        $result = Result::find($id);
        return response()->download(storage_path('app/public/results/'.$result->result));
    }


    public function render()
    {
        $results = Result::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('result', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('year', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('term', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.result-component',['results'=>$results])->layout('layouts.base');
    }
}

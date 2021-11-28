<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class NoticeComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }
    public function render()
    {
        $notices = Notice::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.notice-component',['notices'=>$notices])->layout('layouts.base');
    }
}

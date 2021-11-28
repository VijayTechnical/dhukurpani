<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideoComponent extends Component
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
        $videos = Video::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.video-component',['videos'=>$videos])->layout('layouts.base');
    }
}

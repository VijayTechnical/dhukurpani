<?php

namespace App\Http\Livewire;

use App\Models\Gallary;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryComponent extends Component
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
        $galleries = Gallary::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.gallery-component',['galleries'=>$galleries])->layout('layouts.base');
    }
}

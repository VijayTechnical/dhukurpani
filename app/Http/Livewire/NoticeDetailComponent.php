<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class NoticeDetailComponent extends Component
{
    public $notice_slug;
    public $notice_title;

    public function mount($notice_slug)
    {
        $this->notice_slug = $notice_slug;
        $notice = Notice::where('slug',$this->notice_slug)->first();
        $this->notice_title = $notice->title;
    }

    public function download($id)
    {
        $notice = Notice::find($id);
        return response()->download(storage_path('app/public/notices/'.$notice->pdf));
    }

    public function render()
    {
        $notice = Notice::where('slug',$this->notice_slug)->first();
        return view('livewire.notice-detail-component',['notice'=>$notice])->layout('layouts.base');
    }
}

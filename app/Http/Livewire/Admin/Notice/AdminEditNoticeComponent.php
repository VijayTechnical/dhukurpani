<?php

namespace App\Http\Livewire\Admin\Notice;

use Carbon\Carbon;
use App\Models\Notice;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditNoticeComponent extends Component
{
    use WithFileUploads;

    public $pdf;
    public $newpdf;
    public $title;
    public $description;
    public $slug;
    public $notice_id;

    public function mount($notice_id)
    {
        $this->notice_id = $notice_id;
        $notice = Notice::find($this->notice_id);
        $this->title = $notice->title;
        $this->slug = $notice->slug;
        $this->description = $notice->description;
        $this->pdf = $notice->pdf;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
           'title' => 'required',
           'slug' => 'required|unique:notices,slug,'.$this->notice_id,
           'description' => 'required',
           'newpdf' => 'required',
        ]);
    }

    public function editNotice()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:notices,slug,'.$this->notice_id,
            'description' => 'required',
         ]);

         $notice = Notice::find($this->notice_id);
         $notice->title = $this->title;
         $notice->slug = $this->slug;
         $notice->description = $this->description;
         if($this->newpdf)
         {
             $this->validate([
                 'newpdf' => 'required'
             ]);
             if($notice->pdf)
             {
                 unlink(storage_path('app/public/notices/'.$notice->pdf));
             }
             $pdfName = Carbon::now()->timestamp. '.' .$this->newpdf->extension();
             $this->newpdf->storeAS('public/notices', $pdfName);
             $notice->pdf = $pdfName;
         }
         else
         {
             $notice->pdf = $this->pdf;
         }
         $notice->save();
         $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.notice.admin-edit-notice-component')->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Notice;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Notice;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Notifications\NoticeNotification;
use Notification;

class AdminAddNoticeComponent extends Component
{

    use WithFileUploads;

    public $title;
    public $slug;
    public $description;
    public $pdf;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
           'title' => 'required',
           'slug' => 'required',
           'description' => 'required',
           'pdf' => 'required',
        ]);
    }

    public function addNotice()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'pdf' => 'required',
         ]);

         $notice = new Notice();
         $notice->title = $this->title;
         $notice->slug = $this->slug;
         $notice->description = $this->description;
         $noticeName = Carbon::now()->timestamp. '.' .$this->pdf->extension();
         $this->pdf->storeAs('public/notices',$noticeName);
         $notice->pdf = $noticeName;
         Notification::send(User::all(),new NoticeNotification($notice));
         $notice->save();
         $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.notice.admin-add-notice-component')->layout('layouts.admin');
    }
}

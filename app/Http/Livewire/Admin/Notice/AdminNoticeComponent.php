<?php

namespace App\Http\Livewire\Admin\Notice;

use App\Models\Notice;
use Livewire\Component;

class AdminNoticeComponent extends Component
{

    public function deleteNotice($id)
    {
        $notice = Notice::find($id);
        if($notice->pdf)
        {
            unlink(storage_path('app/public/notices/'.$notice->pdf));
        }
        $notice->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $notices = Notice::orderBy('created_at','DESC')->get();
        return view('livewire.admin.notice.admin-notice-component',['notices'=>$notices])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Popup;

use Carbon\Carbon;
use App\Models\Popup;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminPopupComponent extends Component
{

    use WithFileUploads;

    public $image;
    public $newimage;


    public function mount()
    {
        $popup = Popup::find(1);
        if ($popup) {
            $this->image = $popup->image;
        }
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'newimage' => 'required|mimes:png,jpg',
        ]);
    }

    public function updatePopup()
    {

        $popup = popup::find(1);
        if ($popup) {
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($popup->image) {
                    unlink(storage_path('app/public/popups/' . $popup->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/popups', $imageName);
                $popup->image = $imageName;
            } else {
                $popup->image = $this->image;
            }
            $popup->save();
        } else {
            $popup = new Popup();
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($popup->image) {
                    unlink(storage_path('app/public/popups/' . $popup->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/popups', $imageName);
                $popup->image = $imageName;
            } else {
                $popup->image = $this->image;
            }
            $popup->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.popup.admin-popup-component')->layout('layouts.admin');
    }
}

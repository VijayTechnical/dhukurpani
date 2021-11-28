<?php

namespace App\Http\Livewire\Admin\Principal;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Principal;
use Livewire\WithFileUploads;

class AdminPrincipalComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $newimage;
    public $message;

    public function mount()
    {
        $principal = Principal::find(1);
        if($principal)
        {
            $this->name = $principal->name;
            $this->image = $principal->image;
            $this->message = $principal->message;
        }
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'newimage' => 'required|mimes:png,jpg',
            'message' => 'required',
        ]);
    }

    public function updatePrincipal()
    {
        $principal = Principal::find(1);
        if ($principal) {
            $principal->name = $this->name;
            $principal->message = $this->message;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($principal->image) {
                    unlink(storage_path('app/public/principals/' . $principal->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/principals', $imageName);
                $principal->image = $imageName;
            } else {
                $principal->image = $this->image;
            }
            $principal->save();
        } else {
            $principal = new Principal();
            $principal->name = $this->name;
            $principal->message = $this->message;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($principal->image) {
                    unlink(storage_path('app/public/principals/' . $principal->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/principals', $imageName);
                $principal->image = $imageName;
            } else {
                $principal->image = $this->image;
            }
            $principal->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.principal.admin-principal-component')->layout('layouts.admin');
    }
}

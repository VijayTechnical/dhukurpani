<?php

namespace App\Http\Livewire\Admin\Profile;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfileComponent extends Component
{
    use WithFileUploads;

    public $user_id;
    public $image;
    public $email;
    public $name;
    public $newimage;


    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $user = User::find($this->user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->profile_photo_path;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'newimage' => 'required|mimes:png,jpg'
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ]);
        $user = User::find($this->user_id);
        $user->name = $user->name;
        $user->email = $this->email;
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if($user->profile_photo_path)
            {
                unlink(storage_path('app/public/users/'.$user->profile_photo_path));
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAS('public/users', $imageName);
            $user->profile_photo_path = $imageName;
        }
        else
        {
            $user->profile_photo_path = $this->image;
        }
        $user->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Profile Updated Sucessfully',
        ]);
    }
    public function render()
    {
        $user = User::find($this->user_id);
        return view('livewire.admin.profile.admin-profile-component',['user'=>$user])->layout('layouts.admin');
    }
}

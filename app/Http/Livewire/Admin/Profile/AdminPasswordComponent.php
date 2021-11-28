<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminPasswordComponent extends Component
{
    public $user_id;
    public $user_password;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $user = User::find($this->user_id);
        $this->user_password = $user->password;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if(Hash::check($this->current_password,$this->user_password))
        {
            $user = User::findOrFail($this->user_id);
            $user->password = Hash::make($this->password);
            $user->save();
            $this->clear();
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'Password Updated Sucessfully',
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'Password does not match',
            ]);
        }
    }

    public function clear()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function render()
    {
        return view('livewire.admin.profile.admin-password-component')->layout('layouts.admin');
    }
}

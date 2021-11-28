<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminUserComponent extends Component
{

    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->utype == 'USR') {
            $user->utype = 'ADM';
            $user->save();
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'User updated sucessfully.',
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'error',
                'title' => 'Error',
                'text' => 'You cant change the role.',
            ]);
        }
    }

    public function render()
    {
        $users = User::where('utype','USR')->orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.user.admin-user-component', ['users' => $users])->layout('layouts.admin');
    }
}

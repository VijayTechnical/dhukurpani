<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Testimonial;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardComponent extends Component
{
    use WithFileUploads;

    public $user_id;
    public $email;
    public $image;
    public $name;
    public $newimage;
    public $current_password;
    public $password;
    public $password_confirmation;
    public $message;


    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $user = User::find($this->user_id);
        $this->image = $user->profile_photo_path;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email',
            'name' => 'required',
            'newimage' => 'required|mimes:png,jpg',
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
            'message' => 'required',
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        $user = User::find($this->user_id);
        $user->name = $this->name;
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

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
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

    public function addReview()
    {
        $this->validate([
            'message' => 'required'
        ]);
        $testimonial = new Testimonial();
        $testimonial->message = $this->message;
        $testimonial->status = 'inactive';
        $testimonial->user_id = $this->user_id;
        $testimonial->save();
        $this->clear();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Review Added Sucessfully',
        ]);
    }

    public function clear()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.user.dashboard.user-dashboard-component')->layout('layouts.base');
    }
}

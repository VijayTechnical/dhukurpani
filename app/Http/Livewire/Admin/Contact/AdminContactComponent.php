<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('livewire.admin.contact.admin-contact-component',['contacts'=>$contacts])->layout('layouts.admin');
    }
}

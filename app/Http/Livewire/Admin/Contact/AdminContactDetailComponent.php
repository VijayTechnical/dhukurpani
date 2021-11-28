<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class AdminContactDetailComponent extends Component
{
    public $contact_id;
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $reply;

    public function mount($contact_id)
    {
        $this->contact_id = $contact_id;
        $contact = Contact::find($this->contact_id);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'reply' => 'required'
        ]);
    }

    public function addReply()
    {
        $this->validate([
            'reply' => 'required'
        ]);

        $contact = Contact::find($this->contact_id);
        $email = $contact->email;
        $details = [
            'title' => 'Mail from dhukurpanischool.edu.np',
            'body' => $this->reply,
        ];
        Mail::to($email)->send(new ContactMail($details));
        $contact->status = 'replied';
        $contact->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Message is sent sucessfully',
        ]);

        return redirect()->to('/admin/contact');

    }

    public function render()
    {
        return view('livewire.admin.contact.admin-contact-detail-component')->layout('layouts.admin');
    }
}

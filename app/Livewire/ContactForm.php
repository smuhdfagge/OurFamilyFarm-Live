<?php

namespace App\Livewire;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEnquiry;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $service = '';
    public $message = '';
    public $website = '';
    public $successMessage = '';

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:30'],
        'service' => ['nullable', 'string', 'max:150'],
        'message' => ['required', 'string', 'min:20', 'max:2000'],
        'website' => ['nullable', 'max:0'],
    ];

    public function submitForm()
    {
        $this->validate();

        if (! empty($this->website)) {
            return;
        }

        $submission = ContactSubmission::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'service' => $this->service,
            'message' => $this->message,
            'status' => 'new',
        ]);

        Mail::to(config('company.email'))->queue(new ContactEnquiry($submission));

        $this->reset(['name', 'email', 'phone', 'service', 'message', 'website']);
        $this->successMessage = 'Your enquiry has been sent successfully.';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

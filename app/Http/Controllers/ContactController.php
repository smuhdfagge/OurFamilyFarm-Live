<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEnquiry;
use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $submission = ContactSubmission::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service'],
            'message' => $data['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'new',
        ]);

        Mail::to(config('company.email'))->queue(new ContactEnquiry($submission));

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }
}

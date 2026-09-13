<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminEnquiryController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim($request->string('q')->toString());
        $status = $request->string('status')->toString();
        $statuses = ['new', 'contacted', 'resolved', 'archived'];
        $enquiriesQuery = ContactSubmission::query()->latest();

        if ($search !== '') {
            $enquiriesQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('service', 'like', '%'.$search.'%')
                    ->orWhere('message', 'like', '%'.$search.'%');
            });
        }

        if (in_array($status, $statuses, true)) {
            $enquiriesQuery->where('status', $status);
        } else {
            $status = '';
        }

        return view('admin.enquiries.index', [
            'enquiries' => $enquiriesQuery->paginate(15)->withQueryString(),
            'totalCount' => ContactSubmission::count(),
            'newCount' => ContactSubmission::where('status', 'new')->count(),
            'contactedCount' => ContactSubmission::where('status', 'contacted')->count(),
            'resolvedCount' => ContactSubmission::where('status', 'resolved')->count(),
            'search' => $search,
            'status' => $status,
        ]);
    }

    public function show(ContactSubmission $enquiry): View
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, ContactSubmission $enquiry): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,contacted,resolved,archived'],
        ]);

        $enquiry->update($data);

        return redirect()->route('admin.enquiries.show', $enquiry)->with('status', 'Enquiry status updated.');
    }

    public function destroy(ContactSubmission $enquiry): RedirectResponse
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('status', 'Enquiry removed.');
    }
}

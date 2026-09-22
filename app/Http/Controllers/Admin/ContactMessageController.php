<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.contact-messages.index', [
            'messages' => ContactMessage::orderByDesc('created_at')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function destroy(ContactMessage $contact_message): RedirectResponse
    {
        $contact_message->delete();

        return redirect()->route('admin.contact-messages.index')->with('status', 'Message deleted.');
    }
}

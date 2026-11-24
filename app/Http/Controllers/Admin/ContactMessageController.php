<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $query = ContactMessage::orderByDesc('created_at')->orderByDesc('id');

        if ($search !== '') {
            $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%"));
        }

        return view('admin.contact-messages.index', [
            'messages' => $query->paginate(PerPage::resolve($request))->withQueryString(),
            'search' => $search,
            'total' => ContactMessage::count(),
        ]);
    }

    public function destroy(Request $request, ContactMessage $contact_message): RedirectResponse
    {
        $contact_message->delete();

        return $this->backTo($request, 'admin.contact-messages.index', "Message from {$contact_message->name} deleted.");
    }
}

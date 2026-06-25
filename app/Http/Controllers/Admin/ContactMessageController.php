<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::query();

        $status = $request->string('status')->toString();
        if ($status && array_key_exists($status, ContactMessage::STATUSES)) {
            $query->where('status', $status);
        }

        $messages = $query->orderByDesc('created_at')->paginate(30)->withQueryString();

        return view('admin.contact_messages.index', [
            'messages'     => $messages,
            'statuses'     => ContactMessage::STATUSES,
            'activeStatus' => $status,
            'counts'       => ContactMessage::selectRaw('status, count(*) as c')
                ->groupBy('status')->pluck('c', 'status')->all(),
        ]);
    }

    public function show(ContactMessage $contactMessage): View
    {
        return view('admin.contact_messages.show', [
            'message' => $contactMessage,
        ]);
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(ContactMessage::STATUSES))],
            'notes'  => ['nullable', 'string', 'max:6000'],
        ]);

        $contactMessage->update($data);

        return redirect()->route('admin.contact-messages.show', $contactMessage)
            ->with('status', 'Mesaj güncellendi.');
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-messages.index')
            ->with('status', 'Mesaj silindi.');
    }
}

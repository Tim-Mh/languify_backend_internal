@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
    <p class="mb-4 text-sm text-gray-500">Messages submitted through the public Contact Us form.</p>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Message</th>
                    <th class="px-4 py-2">Received</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($messages as $msg)
                    <tr>
                        <td class="px-4 py-2 align-top font-semibold">{{ $msg->name }}</td>
                        <td class="px-4 py-2 align-top">
                            <a href="mailto:{{ $msg->email }}" class="text-blue-600 hover:underline">{{ $msg->email }}</a>
                        </td>
                        <td class="px-4 py-2 align-top max-w-lg whitespace-pre-wrap text-sm text-gray-700">{{ $msg->message }}</td>
                        <td class="px-4 py-2 align-top text-sm text-gray-500">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 align-top">
                            <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No messages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>
@endsection

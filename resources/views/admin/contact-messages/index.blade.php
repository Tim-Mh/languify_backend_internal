@extends('layouts.admin')

@section('title', 'Contact messages')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <p class="max-w-2xl text-sm text-gray-600">
            Messages sent through the <strong>Contact us</strong> form on the website and in the app, newest first.
            Reply from your own email using the learner's address; replies are not sent from this panel.
        </p>

        <form method="GET" class="card flex flex-wrap items-end gap-3 p-4">
            <div class="min-w-0 flex-1 basis-64">
                <label for="search" class="mb-1 block text-xs font-bold text-gray-500">Search</label>
                <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Name, email or words in the message" class="field-input">
            </div>
            <button type="submit" class="btn-primary">Search</button>
            @if ($search !== '')
                <a href="{{ route('admin.contact-messages.index') }}" class="py-2.5 text-sm font-bold text-gray-500 hover:text-gray-900">Clear</a>
            @endif
        </form>

        <x-per-page :paginator="$messages" noun="messages" />

        <div class="space-y-3">
            @forelse ($messages as $msg)
                @php($long = mb_strlen($msg->message) > 320 || substr_count($msg->message, "\n") > 4)
                <article class="card p-5" data-message>
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 font-bold uppercase text-brand-600">{{ mb_substr($msg->name ?: $msg->email, 0, 1) }}</span>
                            <div class="min-w-0">
                                <p class="truncate font-bold text-ink-900">{{ $msg->name }}</p>
                                <a href="mailto:{{ $msg->email }}" class="block truncate text-sm font-semibold text-brand-600 hover:underline">{{ $msg->email }}</a>
                            </div>
                        </div>
                        <div class="flex shrink-0 items-start gap-1">
                            <time datetime="{{ $msg->created_at->toIso8601String() }}" title="{{ $msg->created_at->format('M j, Y g:i a') }}" class="hidden pt-2 text-right text-xs text-gray-500 sm:block">
                                {{ $msg->created_at->format('M j, Y') }}<br>{{ $msg->created_at->diffForHumans() }}
                            </time>
                            <x-admin.row-actions
                                :delete="route('admin.contact-messages.destroy', $msg)"
                                :name="'message from '.$msg->name"
                                :confirm="'The message from '.$msg->name.' ('.$msg->email.') is removed for good. Copy anything you still need first.'" />
                        </div>
                    </div>

                    <time datetime="{{ $msg->created_at->toIso8601String() }}" class="mt-2 block text-xs text-gray-500 sm:hidden">{{ $msg->created_at->format('M j, Y g:i a') }} · {{ $msg->created_at->diffForHumans() }}</time>

                    <p class="mt-3 whitespace-pre-wrap break-words rounded-xl bg-gray-50 p-4 text-sm leading-relaxed text-gray-800 {{ $long ? 'line-clamp-4' : '' }}" data-message-body>{{ $msg->message }}</p>

                    <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm font-bold">
                        @if ($long)
                            <button type="button" class="text-gray-600 hover:text-ink-900" data-expand aria-expanded="false">Show full message</button>
                        @endif
                    </div>
                </article>
            @empty
                <div class="card p-10 text-center">
                    @if ($search !== '')
                        <p class="font-bold text-ink-900">No messages match "{{ $search }}".</p>
                        <a href="{{ route('admin.contact-messages.index') }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Show all {{ number_format($total) }} messages</a>
                    @else
                        <p class="font-bold text-ink-900">No messages yet.</p>
                        <p class="mt-1 text-sm text-gray-500">When someone uses the Contact us form, their message appears here.</p>
                    @endif
                </div>
            @endforelse
        </div>

        <div>{{ $messages->links() }}</div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('click', (event) => {
            const button = event.target.closest('[data-expand]')
            if (!button) return
            const body = button.closest('[data-message]').querySelector('[data-message-body]')
            const open = body.classList.toggle('line-clamp-4') === false
            button.textContent = open ? 'Show less' : 'Show full message'
            button.setAttribute('aria-expanded', open ? 'true' : 'false')
        })
    </script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invite Codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-8">

                    @if (! auth()->user()->reachedInviteCodeRequestLimit())
                        <form action="{{ route('invites') }}" method="post">
                            @csrf
                            <x-button>Request an Invite Code</x-button>
                        </form>
                    @endif

                    <div>
                        @foreach($inviteCodes as $inviteCode)
                            <div>
                                @if ($inviteCode->approved())
                                    <span x-data @click="window.navigator.clipboard.writeText($el.innerText)">{{ $inviteCode->code }}</span>
                                    ({{ $inviteCode->quantity_used }}/{{ $inviteCode->quantity }}) uses
                                @else
                                    (pending) requested {{ $inviteCode->created_at->toDateString() }}
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

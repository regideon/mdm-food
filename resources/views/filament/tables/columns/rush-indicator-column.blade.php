@php
    $launchDate = $getState();
    $record = $getRecord();

    if (!$launchDate) {
        $isRush = false;
        $daysLeft = null;
        $status = '';
    } else {
        $launchCarbon = \Carbon\Carbon::parse($launchDate)->startOfDay();
        $today = \Carbon\Carbon::now()->startOfDay();
        $daysLeft = $today->diffInDays($launchCarbon, false);
        $isRush = $daysLeft >= 0 && $daysLeft <= 5;

        if ($daysLeft <= 0) {
            $status = 'OVERDUE';
        } elseif ($daysLeft <= 2) {
            $status = 'URGENT';
        } else {
            $status = 'RUSH';
        }
    }
@endphp

@if ($isRush)
    <div class="inline-flex items-center gap-2 font-sans">
        <div class="relative inline-flex cursor-pointer flex-shrink-0 group/tooltip">
            {{-- All rush orders use red/danger styling for icons --}}
            <svg width="18" height="18" fill="#dc3545" viewBox="0 0 20 20"
                class="transition-transform duration-200 group-hover/tooltip:scale-110">
                <path fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>

            <div
                class="absolute left-1/2 bottom-full transform -translate-x-1/2 mb-2 px-3 py-1.5 text-white text-xs font-medium whitespace-nowrap rounded-md shadow-lg z-[1000] opacity-0 invisible group-hover/tooltip:opacity-100 group-hover/tooltip:visible transition-all duration-200 bg-red-600 before:content-[''] before:absolute before:top-full before:left-1/2 before:-translate-x-1/2 before:border-4 before:border-transparent before:border-t-red-600">
                @if ($daysLeft <= 0)
                    OVERDUE - Past launch date by {{ abs($daysLeft) }} day(s)
                @elseif($daysLeft == 1)
                    URGENT - Only 1 day left until launch!
                @else
                    RUSH - {{ $daysLeft }} days until launch
                @endif
            </div>
        </div>

        <span
            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide whitespace-nowrap bg-red-100 text-red-700 border border-red-200 
            {{ $daysLeft <= 0 ? 'font-bold animate-[shake_0.5s_ease-in-out]' : ($daysLeft <= 2 ? 'animate-pulse' : '') }}">
            {{ $status }}
            @if ($daysLeft > 0 && $daysLeft <= 5)
                ({{ $daysLeft }}d)
            @endif
        </span>
    </div>
@endif

@push('styles')
    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-2px);
            }

            75% {
                transform: translateX(2px);
            }
        }
    </style>
@endpush

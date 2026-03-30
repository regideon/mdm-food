@php
    $total = count($approvalSteps);
    $completedCount = $currentStep - 1;
    $progressPercent = $total > 1 ? ($completedCount / ($total - 1)) * 100 : 0;
@endphp

<div
    style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1.25rem 1.5rem; margin-bottom: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">

    {{-- Header row --}}
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <span style="font-size: 0.875rem; font-weight: 600; color: #374151;">Approval Progress</span>
        <span style="font-size: 0.875rem; color: #6b7280;">
            {{ $completedCount }}/{{ $total }} –
            <span style="color: #2563eb; font-weight: 600;">
                {{ $currentStep >= $total ? 'COMPLETED' : 'IN PROGRESS' }}
            </span>
        </span>
    </div>

    {{-- Progress bar --}}
    <div style="width: 100%; height: 4px; background: #e5e7eb; border-radius: 9999px; margin-bottom: 1.5rem;">
        <div
            style="height: 4px; border-radius: 9999px; background: #2563eb; width: {{ $progressPercent }}%; transition: width 0.5s ease;">
        </div>
    </div>

    {{-- Steps --}}
    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
        @foreach ($approvalSteps as $step => $label)
            @php
                $isCompleted = $step < $currentStep;
                $isCurrent = $step === $currentStep;
            @endphp

            <div style="display: flex; flex-direction: column; align-items: center; flex: 1; min-width: 0;">
                {{-- Circle --}}
                <div
                    style="
                    width: 2rem; height: 2rem;
                    border-radius: 9999px;
                    display: flex; align-items: center; justify-content: center;
                    font-size: 0.75rem; font-weight: 700;
                    border: 2px solid {{ $isCompleted || $isCurrent ? '#2563eb' : '#d1d5db' }};
                    background: {{ $isCompleted || $isCurrent ? '#2563eb' : '#ffffff' }};
                    color: {{ $isCompleted || $isCurrent ? '#ffffff' : '#9ca3af' }};
                    {{ $isCurrent ? 'box-shadow: 0 0 0 4px #dbeafe;' : '' }}
                ">
                    @if ($isCompleted)
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    @else
                        {{ $step }}
                    @endif
                </div>

                {{-- Label --}}
                <span
                    style="
                    margin-top: 0.4rem;
                    text-align: center;
                    font-size: 0.65rem;
                    line-height: 1.2;
                    max-width: 60px;
                    word-break: break-word;
                    font-weight: {{ $isCurrent ? '600' : '400' }};
                    color: {{ $isCurrent ? '#2563eb' : ($isCompleted ? '#6b7280' : '#9ca3af') }};
                ">
                    {{ $label }}
                </span>
            </div>
        @endforeach
    </div>

</div>

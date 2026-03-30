<x-filament-widgets::widget>
    <div class="bg-white rounded-xl shadow-sm p-6">

        <div class="flex gap-6 flex-wrap">

            {{-- Recent Activity (2/3 width) --}}
            <div class="flex-[2] min-w-[280px]">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm h-full">

                    {{-- Header --}}
                    <div class="flex items-center justify-between px-5 py-3.5 border-b border-slate-100">
                        <h6 class="m-0 text-sm font-semibold text-gray-900">Recent Activity</h6>
                        <a href="/admin/activity-logs" class="text-xs font-medium text-blue-500 no-underline">
                            View All
                        </a>
                    </div>

                    {{-- Activity List --}}
                    <ul class="list-none m-0 px-5 py-0">
                        @foreach ($this->getActivities() as $activity)
                            @php
                                $colorClass = match ($activity['status']) {
                                    'approved' => 'text-green-500',
                                    'pending' => 'text-amber-500',
                                    'rejected' => 'text-red-500',
                                    'new' => 'text-blue-500',
                                    default => 'text-gray-400',
                                };
                            @endphp

                            <li class="flex items-center gap-3 py-3 border-b border-slate-100">

                                {{-- Status Icon --}}
                                <div class="flex-shrink-0 {{ $colorClass }}">
                                    @if ($activity['status'] === 'approved')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @elseif ($activity['status'] === 'pending')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @elseif ($activity['status'] === 'rejected')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>

                                {{-- Title & Description --}}
                                <div class="flex-1 min-w-0 overflow-hidden">
                                    <p class="m-0 text-[13px] font-semibold text-gray-900 truncate">
                                        {{ $activity['title'] }}
                                    </p>
                                    <p class="m-0 text-[11px] text-gray-400 mt-0.5">
                                        {{ $activity['description'] }}
                                    </p>
                                </div>

                                {{-- Timestamp --}}
                                <span class="flex-shrink-0 text-[11px] text-gray-400 whitespace-nowrap">
                                    {{ $activity['time'] }}
                                </span>

                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            {{-- Quick Actions (1/3 width) --}}
            <div class="flex-1 min-w-[200px]">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm h-full">

                    {{-- Header --}}
                    <div class="px-5 py-3.5 border-b border-slate-100">
                        <h6 class="m-0 text-sm font-semibold text-gray-900">Quick Actions</h6>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col gap-3 p-5">
                        @foreach ($this->getQuickActions() as $action)
                            <a href="{{ $action['url'] }}"
                                class="flex items-center gap-3 no-underline rounded-xl px-3.5 py-3 hover:opacity-85 transition-opacity"
                                style="background: {{ $action['bg_color'] }};">

                                {{-- Icon Box --}}
                                <div class="flex items-center justify-center w-9 h-9 rounded-lg flex-shrink-0"
                                    style="background: {{ $action['icon_color'] }};">
                                    <div class="text-white flex">
                                        {!! $action['svg'] !!}
                                    </div>
                                </div>

                                {{-- Label --}}
                                <span class="text-[13px] font-semibold text-slate-800">
                                    {{ $action['label'] }}
                                </span>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</x-filament-widgets::widget>

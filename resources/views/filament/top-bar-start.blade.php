<div class="flex items-center gap-3 pe-6 py-4 bg-[#193859]">
    {{-- Logo/Icon Box --}}
    <div class="flex items-center justify-center w-16 h-12 rounded-xl bg-white/20 flex-shrink-0">
        <x-heroicon-o-rectangle-stack class="w-6 h-6 text-white" />
    </div>

    {{-- App Name & Role --}}
    <div class="flex flex-col">
        <span class="text-white font-bold text-sm leading-tight">MDM Portal</span>
        <span class="text-white/60 text-xs">{{ auth()->user()->roles->first()?->name ?? 'Account' }}</span>
    </div>
</div>

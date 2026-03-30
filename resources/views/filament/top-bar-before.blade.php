<div class="flex items-center gap-3 px-4">
    <div class="w-px h-8 bg-white/20"></div>

    @php
        $pages = [
            'filament.mdm.pages.dashboard' => [
                'title' => 'Dashboard',
                'subtitle' => "Welcome back! Here's your overview.",
            ],

            'filament.mdm.resources.mmrves.index' => ['title' => 'MMRF List', 'subtitle' => 'View and manage MMRF records'],
            'filament.mdm.pages.create-mmrf' => ['title' => 'Create MMRF', 'subtitle' => 'Submit a MMRF create request'],
            'filament.mdm.pages.update-mmrf' => ['title' => 'Update MMRF', 'subtitle' => 'Submit a MMRF update request'],

            'filament.mdm.pages.create-purf' => ['title' => 'Create PURF', 'subtitle' => 'Submit a PURF create request'],

            'filament.mdm.pages.report' => ['title' => 'Reports', 'subtitle' => 'View and export reports'],

            'filament.mdm.resources.users.index' => ['title' => 'User Management', 'subtitle' => 'Manage system users'],

            'filament.mdm.resources.roles.index' => ['title' => 'Role Management', 'subtitle' => 'Manage user roles'],
        ];

        $current = $pages[request()->route()->getName()] ?? null;
    @endphp

    @if ($current)
        <div class="flex flex-col leading-tight">
            <span class="text-white font-bold text-base">{{ $current['title'] }}</span>
            <span class="text-white/60 text-xs">{{ $current['subtitle'] }}</span>
        </div>
    @endif
</div>

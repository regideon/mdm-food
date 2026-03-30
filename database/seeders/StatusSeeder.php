<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [

            // ─────────────────────────────────────────
            // MMRF Statuses
            // ─────────────────────────────────────────
            [
                'name'        => 'Draft',
                'description' => 'MMRF has been created but not yet submitted.',
                'color'       => 'gray',
                'icon'        => 'heroicon-o-pencil-square',
                'type'        => 'mmrf',
            ],
            [
                'name'        => 'Submitted',
                'description' => 'MMRF has been submitted and is awaiting review.',
                'color'       => 'blue',
                'icon'        => 'heroicon-o-paper-airplane',
                'type'        => 'mmrf',
            ],
            [
                'name'        => 'For Review',
                'description' => 'MMRF is currently being reviewed by the department head.',
                'color'       => 'yellow',
                'icon'        => 'heroicon-o-eye',
                'type'        => 'mmrf',
            ],
            [
                'name'        => 'Completed',
                'description' => 'MMRF has been approved and fully processed.',
                'color'       => 'green',
                'icon'        => 'heroicon-o-check-circle',
                'type'        => 'mmrf',
            ],
            [
                'name'        => 'Return',
                'description' => 'MMRF has been returned to the requester for corrections.',
                'color'       => 'orange',
                'icon'        => 'heroicon-o-arrow-uturn-left',
                'type'        => 'mmrf',
            ],
            [
                'name'        => 'Rejected',
                'description' => 'MMRF has been rejected and will not be processed.',
                'color'       => 'red',
                'icon'        => 'heroicon-o-x-circle',
                'type'        => 'mmrf',
            ],

            // ─────────────────────────────────────────
            // PURF Statuses
            // ─────────────────────────────────────────
            [
                'name'        => 'Draft',
                'description' => 'PURF has been created but not yet submitted.',
                'color'       => 'gray',
                'icon'        => 'heroicon-o-pencil-square',
                'type'        => 'purf',
            ],
            [
                'name'        => 'Submitted',
                'description' => 'PURF has been submitted and is awaiting review.',
                'color'       => 'blue',
                'icon'        => 'heroicon-o-paper-airplane',
                'type'        => 'purf',
            ],
            [
                'name'        => 'For Review',
                'description' => 'PURF is currently being reviewed by the department head.',
                'color'       => 'yellow',
                'icon'        => 'heroicon-o-eye',
                'type'        => 'purf',
            ],
            [
                'name'        => 'Completed',
                'description' => 'PURF has been approved and fully processed.',
                'color'       => 'green',
                'icon'        => 'heroicon-o-check-circle',
                'type'        => 'purf',
            ],
            [
                'name'        => 'Return',
                'description' => 'PURF has been returned to the requester for corrections.',
                'color'       => 'orange',
                'icon'        => 'heroicon-o-arrow-uturn-left',
                'type'        => 'purf',
            ],
            [
                'name'        => 'Rejected',
                'description' => 'PURF has been rejected and will not be processed.',
                'color'       => 'red',
                'icon'        => 'heroicon-o-x-circle',
                'type'        => 'purf',
            ],
        ];

        foreach ($statuses as $status) {
            DB::table('statuses')->updateOrInsert(
                ['name' => $status['name'], 'type' => $status['type']],
                array_merge($status, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('✅ Status seeder completed: MMRF and PURF statuses inserted/updated.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Purf extends Model
{

    protected $casts = [
        'requested_at'            => 'datetime',
        'date'                    => 'date',
        'launch_date'             => 'date',
        'expiry_date'             => 'date',
        'launch_date_checker'     => 'date',
        'data_types'              => 'array',
        'channel_coverage'        => 'array',
        'menu_details'            => 'array',
        'pilot_stores'            => 'array',
        'pp_marketing_campaign'   => 'array',
        'regular_bom'             => 'array',
        'combo_bom_items'         => 'array',
        'product_hierarchy_items' => 'array',
        'mis_items'               => 'array',
        'dsmr_items'              => 'array',
        'dual_screens'            => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            if (Auth::check()) {
                $model->requested_by  = $model->requested_by ?? Auth::id();
                $model->code = $model->code ?? strtoupper(uniqid());
                $model->status_id = $model->status_id ?? 8; // Default to "Submitted" status
                $model->requested_at = $model->requested_at ?? now();
            }
        });
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

@props([
    'state' => 'synced',
    'label' => null,
])

@php
    $labels = [
        'synced' => 'All changes saved',
        'syncing' => 'Syncing changes',
        'offline' => 'Working offline',
        'conflict' => 'Sync conflict needs review',
    ];
@endphp

<span {{ $attributes->class('tz-sync-indicator') }} data-state="{{ $state }}" role="status">
    {{ $label ?? ($labels[$state] ?? $labels['synced']) }}
</span>

@props([
    'label',
    'value',
    'detail' => null,
    'state' => 'neutral',
])

<article {{ $attributes->class(['tz-card', 'tz-metric-card']) }}>
    <div class="tz-metric-card__label">{{ $label }}</div>
    <div class="tz-metric-card__value">{{ $value }}</div>
    @if ($detail)
        <div class="tz-status tz-status--{{ $state }}">{{ $detail }}</div>
    @endif
</article>

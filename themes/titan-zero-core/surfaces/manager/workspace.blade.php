<x-titan-zero::shell :theme-variant="$themeVariant ?? 'standard'" :vertical="$vertical ?? 'general'">
    <x-slot:navigation>{{ $navigation ?? '' }}</x-slot:navigation>
    <x-slot:header>
        <div class="tz-manager-header">
            <div>
                <p class="tz-eyebrow">{{ $verticalLabel ?? 'Business operations' }}</p>
                <h1>{{ $title ?? 'Today' }}</h1>
            </div>
            <x-titan-zero::sync-indicator :state="$syncState ?? 'synced'" />
        </div>
    </x-slot:header>

    <section class="tz-metric-grid" aria-label="Operational summary">
        {{ $summary ?? '' }}
    </section>

    <section class="tz-manager-layout">
        <div class="tz-manager-primary">{{ $slot }}</div>
        <aside class="tz-manager-attention" aria-label="Needs attention">
            {{ $attention ?? '' }}
        </aside>
    </section>

    <x-slot:assistant>{{ $assistant ?? '' }}</x-slot:assistant>
</x-titan-zero::shell>

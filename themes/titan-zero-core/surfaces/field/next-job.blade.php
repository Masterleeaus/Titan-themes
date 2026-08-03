@props([
    'job',
    'syncState' => 'synced',
])

<section class="tz-field-job" aria-labelledby="next-job-title">
    <header class="tz-field-job__header">
        <div>
            <p class="tz-eyebrow">Next job</p>
            <h1 id="next-job-title">{{ data_get($job, 'title', 'Scheduled job') }}</h1>
            <p>{{ data_get($job, 'customer') }} · {{ data_get($job, 'address') }}</p>
        </div>
        <x-titan-zero::sync-indicator :state="$syncState" />
    </header>

    <div class="tz-card tz-field-job__context">
        <dl>
            <div><dt>Arrival</dt><dd>{{ data_get($job, 'scheduled_at', 'Not set') }}</dd></div>
            <div><dt>Access</dt><dd>{{ data_get($job, 'access', 'No access notes') }}</dd></div>
            <div><dt>Priority</dt><dd><span class="tz-status tz-status--{{ data_get($job, 'priority', 'neutral') }}">{{ ucfirst(data_get($job, 'priority', 'normal')) }}</span></dd></div>
        </dl>
    </div>

    <div class="tz-field-job__actions">
        <button class="tz-action" type="button">Start job</button>
        <button class="tz-action tz-action--secondary" type="button">Open route</button>
    </div>

    {{ $slot }}
</section>

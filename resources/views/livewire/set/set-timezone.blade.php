<div></div>

@push('script-body-field')
    <script>
        document.addEventListener('livewire:initialized', function() {
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            Livewire.dispatch('setTimeZone', { timezone: timezone });
        });
    </script>
@endpush
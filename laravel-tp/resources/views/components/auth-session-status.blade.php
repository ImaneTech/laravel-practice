@props(['status'])

<!-- Affiche un petit message de statut, par exemple après une action réussie. -->
@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ __($status) }}
    </div>
@endif

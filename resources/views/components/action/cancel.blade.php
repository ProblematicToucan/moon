@props(['route'])

<flux:button wire:navigate :href="route($route . '.index')">
    {{ __('Cancel') }}
</flux:button>

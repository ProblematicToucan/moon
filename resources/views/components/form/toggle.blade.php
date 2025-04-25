@props(['options'])

<flux:switch wire:model="{{ $options['name'] }}" :label="$options['label'] ?? $options['name']"
    :description="$options['description'] ?? ''" :align="$options['align'] ?? null" />

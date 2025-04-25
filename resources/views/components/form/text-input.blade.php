@props(['options'])

<flux:input :label="$options['label'] ?? $options['name']" :description="$options['description'] ?? ''"
    :type="$options['type'] ?? 'text'" wire:model="{{ $options['name'] }}" :multiple="$options['multiple'] ?? false"
    :placeholder="$options['placeholder'] ?? ''" :icon="$options['icon'] ?? null"
    :icon:trailing="$options['icon_trailing'] ?? null" />

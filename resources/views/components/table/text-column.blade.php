@props(['value', 'options' => []])
@php
    $colorCallback = $options['color'] ?? null;
    $color = $colorCallback ? $colorCallback($value) : 'gray';

    if (isset($options['diffForHuman'])) {
        $value = $options['diffForHuman']
            ? \Carbon\Carbon::make($value)->diffForHumans()
            : \Carbon\Carbon::make($value)->format('d M Y, H:i');
    }

@endphp
<flux:table.cell>
    @if (!empty($options['badge']))
        <flux:badge size="sm" :color="$color" inset="top bottom">{{ $value }}</flux:badge>
    @else
        {{ $value }}
    @endif
</flux:table.cell>

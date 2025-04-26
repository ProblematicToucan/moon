@aware(['heading', 'subheading', 'model', 'pages'])
@php
    $userRoutePattern = request()->routeIs('admin.user.*');
    $exchangeRoutePattern = request()->routeIs('admin.exchange.*');
@endphp

<x-layouts.partial maxWidth="max-w-5xl">
    <x-slot:navlist>
        @can('viewAny', \App\Models\User::class)
            <flux:navlist.item :href="route('admin.user.index')" :current="$userRoutePattern" wire:navigate>
                {{ __('User') }}
            </flux:navlist.item>
        @endcan
        @can('viewAny', \App\Models\Exchange::class)
            <flux:navlist.item :href="route('admin.exchange.index')" :current="$exchangeRoutePattern" wire:navigate>
                {{ __('Exchange') }}
            </flux:navlist.item>
        @endcan
    </x-slot:navlist>

    {{ $slot }}
</x-layouts.partial>

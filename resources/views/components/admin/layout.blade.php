<x-layouts.partial :heading="$heading" :subheading="$subheading" maxWidth="max-w-5xl" :model="$model">
    <x-slot:navlist>
        @can('viewAny', \App\Models\User::class)
            <flux:navlist.item :href="route('admin.user.index')" wire:navigate>{{ __('User') }}</flux:navlist.item>
        @endcan
        @can('viewAny', \App\Models\Exchange::class)
            <flux:navlist.item :href="route('admin.exchange.index')" wire:navigate>{{ __('Exchange') }}</flux:navlist.item>
        @endcan
    </x-slot:navlist>

    {{ $slot }}
</x-layouts.partial>

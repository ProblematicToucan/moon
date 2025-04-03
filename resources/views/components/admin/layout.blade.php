<x-layouts.partial :heading="$heading" :subheading="$subheading" maxWidth="max-w-5xl">
    <x-slot:navlist>
        <flux:navlist.item :href="route('admin.user.index')" wire:navigate>{{ __('User') }}</flux:navlist.item>
    </x-slot:navlist>

    {{ $slot }}
</x-layouts.partial>

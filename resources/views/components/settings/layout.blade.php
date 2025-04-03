<x-layouts.partial :heading="$heading" :subheading="$subheading">
    <x-slot:navlist>
        <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
        <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Password') }}</flux:navlist.item>
        <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }}</flux:navlist.item>
    </x-slot:navlist>

    {{ $slot }}
</x-layouts.partial>

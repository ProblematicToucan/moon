@props(['model' => \App\Models\User::class])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-admin.layout :heading="__('User')" :subheading="__('Manage user application resources')" :model="$model">
            <livewire:admin.user.user-table :model="$model" />
        </x-admin.layout>
    </section>
</x-layouts.app>

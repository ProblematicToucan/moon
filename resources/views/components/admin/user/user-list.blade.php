@props(['model' => null])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-admin.layout :heading="__('User')" :subheading="__('Manage user application resources')" :model="$model">
            {{ $slot }}
        </x-admin.layout>
    </section>
</x-layouts.app>

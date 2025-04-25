@props(['model' => null])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-admin.layout :heading="__('Exchange')" :subheading="__('Manage exchange application resources')"
            :model="$model">
            {{ $slot }}
        </x-admin.layout>
    </section>
</x-layouts.app>

@props(['model' => \App\Models\Exchange::class])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-admin.layout :heading="__('Exchange')" :subheading="__('Create exchange application resources')"
            :model="$model">
            <livewire:admin.exchange.exchange-create :model="$model" />
        </x-admin.layout>
    </section>
</x-layouts.app>

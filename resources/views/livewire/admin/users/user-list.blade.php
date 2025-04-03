@props(['slot' => null])

<section class="w-full">
    @include('partials.admin-heading')

    <x-admin.layout :heading="__('User')" :subheading="__('Manage user application resources')">
        {!! $table !!}
    </x-admin.layout>
</section>

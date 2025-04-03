<section class="w-full">
    @include('partials.admin-heading')

    <x-admin.layout :heading="__('User')" :subheading="__('Manage user application resources')" :model="$model">
        {!! $table !!}
    </x-admin.layout>
</section>

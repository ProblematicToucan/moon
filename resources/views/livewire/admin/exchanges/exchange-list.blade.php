<section class="w-full">
    @include('partials.admin-heading')

    <x-admin.layout :heading="__('Exchange')" :subheading="__('Manage exchanges application resources')"
        :model="$model">
        {!! $table !!}
    </x-admin.layout>
</section>

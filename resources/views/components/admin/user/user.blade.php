@props(['heading', 'subheading', 'model' => null, 'pages' => null])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-layouts.partial-admin :heading="__($heading)" :subheading="__($subheading)" :model="$model" :pages="$pages">
            {{ $slot }}
        </x-layouts.partial-admin>
    </section>
</x-layouts.app>

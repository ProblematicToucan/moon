@props(['heading', 'subheading', 'model' => null, 'pages' => null])

<x-layouts.app>
    <section class="w-full">
        @include('partials.admin-heading')

        <x-layouts.partial-admin>
            {{ $slot }}
        </x-layouts.partial-admin>
    </section>
</x-layouts.app>

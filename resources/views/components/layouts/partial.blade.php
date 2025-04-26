@props(['navlist', 'heading', 'subheading', 'model' => null, 'maxWidth' => 'max-w-lg', 'pages' => null])

@php
    $canCreate = request()->routeIs('*.index') && !empty($pages['create']) && Gate::allows('create', $model);
    $canUpdate = request()->routeIs('*.edit') && !empty($pages['update']) && Gate::allows('update', $model);
@endphp

<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            {{ $navlist }}
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6 overflow-x-auto pl-2">
        <div class="flex items-center justify-between gap-2 {{ $maxWidth }}">
            <div>
                <flux:heading>{{ $heading }}</flux:heading>
                <flux:subheading>{{ $subheading }}</flux:subheading>
            </div>

            @if ($canCreate)
                <flux:button wire:navigate :href="route($pages['create'])" variant="primary">
                    Create
                </flux:button>
            @elseif ($canUpdate)
                <flux:button wire:navigate :href="route($pages['update'])" variant="secondary">
                    Update
                </flux:button>
            @endif
        </div>

        <div class="mt-5 w-full {{ $maxWidth }}">
            {{ $slot }}
        </div>
    </div>
</div>

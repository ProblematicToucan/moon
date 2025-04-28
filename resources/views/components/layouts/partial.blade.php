@props(['maxWidth' => 'max-w-lg'])
@aware(['navlist', 'heading', 'subheading', 'model', 'pages'])
@php
    $canCreate = request()->routeIs('*.index') && !empty($pages['create']) && Gate::allows('create', $model);
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
                <flux:heading>{{ __($heading) }}</flux:heading>
                <flux:subheading>{{ __($subheading) }}</flux:subheading>
            </div>

            @if ($canCreate)
                <flux:button wire:navigate :href="route($pages['create'])" variant="primary">
                    {{ __('Create') }}
                </flux:button>
            @endif
        </div>

        <div class="mt-5 w-full {{ $maxWidth }}">
            {{ $slot }}
        </div>
    </div>
</div>

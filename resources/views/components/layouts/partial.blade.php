@props(['navlist', 'heading', 'subheading', 'model' => null, 'maxWidth', 'slot'])
<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            {{ $navlist }}
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6 overflow-x-auto pl-2">
        <div class="flex items-center justify-between gap-2 {{ $maxWidth ?? 'max-w-lg' }}">
            <div>
                <flux:heading>{{ $heading ?? '' }}</flux:heading>
                <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>
            </div>
            @if (request()->routeIs('*.index'))
                <div>
                    @can('create', $model)
                        <flux:button variant="primary">Create</flux:button>
                    @endcan
                </div>
            @endif
        </div>

        <div class="mt-5 w-full {{ $maxWidth ?? 'max-w-lg' }}">
            {{ $slot }}
        </div>
    </div>
</div>

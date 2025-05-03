<form wire:submit="{{ $action }}" class="gap-6 flex flex-col my-6 w-full max-w-lg">
    @foreach ($forms as $form)
        <x-dynamic-component :component="$form->getComponent()" :options="$form->getOptions()" />
    @endforeach
    <div class="flex items-center gap-4">
        @foreach ($actions as $action)
            <x-dynamic-component :component="$action->getComponent()" :route="$route" />
        @endforeach
    </div>
</form>

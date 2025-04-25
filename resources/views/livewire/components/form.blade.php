<form action="submit" class="gap-6 flex flex-col my-6 w-full max-w-lg">
    @foreach ($forms as $form)
        <x-dynamic-component :component="$form->getComponent()" :options="$form->getOptions()" />
    @endforeach
</form>

<flux:modal.trigger name="delete">
    <flux:button variant="danger">Delete</flux:button>
</flux:modal.trigger>

<flux:modal name="delete" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Delete record?</flux:heading>

            <flux:text class="mt-2">
                <p>You're about to delete this record.</p>
                <p>This action cannot be reversed.</p>
            </flux:text>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>

            <flux:button wire:click="delete" variant="danger">{{ __('Delete') }}</flux:button>
        </div>
    </div>
</flux:modal>

<div class="border p-4 rounded-2xl border-zinc-800/5 dark:border-white/10 space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <flux:input wire:model.live.debounce.500ms="search" size="sm" icon="magnifying-glass"
                placeholder="Search" />
        </div>
    </div>
    <flux:table :paginate="$data">
        <flux:table.columns>
            @foreach ($columns as $column)
                <flux:table.column class="capitalize select-none" :sortable="!empty($column->getOptions()['sortable'])"
                    :sorted="$sortBy === $column->getKey()" :direction="$sortDirection"
                    wire:click="{{ !empty($column->getOptions()['sortable']) ? 'sort(' . json_encode($column->getKey()) . ')' : null }}">
                    {{ $column->getLabel() }}
                </flux:table.column>
            @endforeach
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($data as $row)
                <flux:table.rows :key="$row->id">
                    @foreach ($columns as $column)
                        <x-dynamic-component :component="$column->getComponent()" :value="$row[$column->getKey()]"
                            :options="$column->getOptions()" />
                    @endforeach
                </flux:table.rows>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>

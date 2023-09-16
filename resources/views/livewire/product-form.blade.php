<tr class="border-b">
    <form wire:submit="updateProduct">
        <td class="text-sm ps-3">{{ $sku }}</td>
        <td class="text-sm"><a target="_blank" href="{{ $permalink }}">{{ $name }}</a></td>
        <td class="px-3">
            <x-filament::input.wrapper>
                <x-filament::input
                    type="text"
                    wire:model="regular_price"
                />
            </x-filament::input.wrapper>
        </td>
        <td class="px-3">
            <x-filament::input.wrapper>
                <x-filament::input
                    type="text"
                    wire:model="sale_price"
                />
            </x-filament::input.wrapper>
        </td>
        <td class="px-3">
            <x-filament::input.wrapper>
                <x-filament::input
                    type="text"
                    wire:model="stock_quantity"
                />
            </x-filament::input.wrapper>
        </td>
        <td class="text-center py-3 pe-3">
            <x-filament::button type="submit">
                <span wire:loading.remove wire.target="updateProduct">Update</span>
                <span wire:loading wire.target="updateProduct">Updating..</span>
            </x-filament::button>
        </td>
    </form>
</tr>

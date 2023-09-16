<x-filament-panels::page>
<div>
    <table class="w-full ring-1 ring-gray-950/5 dark:ring-white/10 rounded-xl bg-white dark:bg-gray-900">
        <thead class="bg-gray-50 dark:bg-white/5">
            <tr class="border-b">
                <th class="text-left py-4 ps-3">Item Number</th>
                <th class="text-left">Name</th>
                <th class="text-center w-32">Regular Price</th>
                <th class="text-center w-32">Sale Price</th>
                <th class="text-center w-20">Stock</th>
                <th class="w-32 pe-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                @livewire('product-form', ['product' => $product])
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="py-4 px-3">
                    <p class="text-sm">Showing 1 to {{ count($products) }} of {{ $total_product }} products</p>
                </td>
                <td class="text-center">
                    @if($page_count>1)
                        <div>
                            @for ($i = 1; $i <= $page_count; $i++)
                                <a class="py-2 px-3 mx-1 border border-primary-600 rounded-lg" href="?page={{$i}}">{{$i}}</a>
                            @endfor
                        </div>
                    @endif
                </td>
            </tr>
        </tfoot>
    </table>
</div>
</x-filament-panels::page>

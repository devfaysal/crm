@php 
    if(get_class($getRecord()) == 'App\Models\Lead'){
        $record = $getRecord()->status;
    }else{
        $record = $getRecord();
    }
@endphp
<span class="px-2 py-0.5 rounded text-xs" style="color: {{ $record->text_color }}; background-color: {{ $record->color }}; ">
    {{ $record->name }}
</span>
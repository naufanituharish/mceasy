@props([
    'formName' => '',
    'fields' => [], 
    'inline' => false,
    'label' => '',
    'wrapperAttributes' => [],
    'useLabel' => true,
    'bordered' => true])

<div class="{{$bordered ? 'border rounded ' : ''}}{{ data_get($wrapperAttributes,'class', null) }}{{ $useLabel ? ' py-1' : ( $bordered ? " py-3" : '') }}{{ $inline ? '' : ( $bordered ? " px-3" : '')}}"
    {{ $attributes->merge($wrapperAttributes) }}>
    @if ($useLabel)
    <div class="field-label">
        <h6 class="f-w-500"><span class="field-title">{{ $label ?? null}}</span></h6>
    </div>
    @endif
    @if ($inline)
        <div class="row">
            @foreach ($fields as $fieldItem)
                @if ($fieldItem->isVisible())
                    <div class="col {{data_get($fieldItem->getColumnAttributes(),"class", null)}}" {{ $attributes->merge($fieldItem->getColumnAttributes()) }}>
                        <x-forms.field :field="$fieldItem" :formName="$formName"/>
                    </div>
                @endif
            @endforeach        
        </div>        
    @else
        @foreach ($fields as $fieldItem)
            @if ($fieldItem->isVisible())
                <x-forms.field :field="$fieldItem" :formName="$formName"/>
            @endif
        @endforeach
    @endif
</div>
 
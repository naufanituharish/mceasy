@props(['field', 'formName'])

@if ($field->isFormatted())
    <x-elements.formatted-data 
        :isRaw="$field->isRaw()" 
        :dataProps="$field->formatted($field->getText(),$field->getProperty())"/> 
@else
    @if ($field->getType() === 'array')
        <x-forms.nested-field 
            :formName="$formName"
            :label="$field->getText()"
            :useLabel="$field->isUseLabel()"
            :fields="$field->getArrayOfFields()" 
            :inline="$field->isInline()"
            :wrapperAttributes="$field->getWrapperAttributes()"
            :bordered="$field->isBordered()"/>          
    @else
        <x-dynamic-component 
            component="forms.fields.{{$field->getType()}}"
            :formName="$formName"
            :label="$field->getText()"
            :useLabel="$field->isUseLabel()"
            :fields="$field->getArrayOfFields()" 
            :inline="$field->isInline()"
            :fieldProperty="$field->getProperty()"
            :fieldAttributes="$field->getFieldAttributes()"
            :fieldArray="$field->getFieldArray()"
            :bindingMode="$field->getBindingMode()"
            :isMultiple="$field->isMultiple()"
            :placeholder="$field->getPlaceholder()"
            :usePrependIndex="$field->usePrependIndex()"
            :formGroupExtra="$field->getFormGroupExtra()"
            :useIndex="$field->isUseIndex()"
            :liveSearch="$field->withLiveSearch()"
            :leftColumn="$field->getLeftColumn()"
            :rightColumn="$field->getRightColumn()"
            />
    @endif
@endif
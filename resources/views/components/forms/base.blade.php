<div class="loader-base" @if ($this->isUseLoading()) wire:loading.class="loader-loading" @endif >
    @if ($this->isUseLoading())
        <div class="loader-loader" wire:loading><span class="spinner-small"></span></div>
    @endif

    @if ($this->useFormWrapper)
        <form method="POST" wire:submit.prevent="submit">
            @csrf
            @foreach ($fields as $field)
                @if ($field->isVisible())
                    <x-forms.field :field="$field" :formName="$this->formName"/>
                @endif
            @endforeach
        </form>
    @else
        @foreach ($fields as $field)
            @if ($field->isVisible())
                <x-forms.field :field="$field" :formName="$this->formName"/>
            @endif
        @endforeach           
    @endif
</div>

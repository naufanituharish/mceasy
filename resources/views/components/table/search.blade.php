@props(['tableName' => '', 'searchPlaceHolder' => '', 'searchWidth'])

<div class="rounded-search pull-right">
    <div class="form-group">
        <input 
            type="text" 
            class="form-control livewire-{{$tableName}}" 
            wire:model.lazy="search" 
            placeholder="{{ $searchPlaceHolder }}"/>
        <button class="btn-clear" type="button" wire:click="clearSearch"><i class="fa fa-times"></i></button>
        <button class="btn-search" type="button" ><i class="fa fa-search"></i></button>
    </div>
</div>

@if ($searchWidth != 180)
    @push('css')
        <style>
            .livewire-{{$tableName}} {
                width: {{$searchWidth}}px !important ;
            }
            .livewire-{{$tableName}}:focus {
                width: {{$searchWidth+40}}px !important;
                -webkit-animation: {{$searchWidth+40}}px 0.2s !important ;
                animation: {{$searchWidth+40}}px 0.2s !important ;

            }
            @media (max-width: 576px){
                .livewire-{{$tableName}} {
                    width: 100% !important ;
                }
                .livewire-{{$tableName}}:focus {
                    width: 100% !important;
                    -webkit-animation: none !important;
                    animation: none !important;
                }
            }
        </style>
    @endpush
@endif
@props([
    'parentAttribute' => '',
    'type' => 'selectable', 
    'field' => '', 
    'text' => ''
])

<li class="{{ $this->getFilterFieldValue($field,$parentAttribute) ? 'selected' : null }}">
    <a href="javascript:;" wire:click="filter('{{ $field }}','{{ $type }}','{{ $parentAttribute }}')" class="dropdown-item {{ $this->getFilterFieldValue($field,$parentAttribute) ? 'selected' : null }}" >
        <span class="bs-ok-default check-mark"></span>
        <span class="text">{{ $text }}</span>
    </a>
</li>
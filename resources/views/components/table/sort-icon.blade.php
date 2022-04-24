@props(['field' => ''])
<span class="float-right" style="position: relative; top: 25px;"> 
    <i class="sort-icon fas fa-sort-up {{ $this->getSortFieldValue($field) === 'desc' ? 'text-primary ' : 'text-grey-darker'}}"></i>
    <i class="sort-icon fas fa-sort-down {{ $this->getSortFieldValue($field) === 'asc' ? 'text-primary ' : 'text-grey-darker'}}"></i>
</span>
@props(['field'])
<p {{$attributes}}> {{ __('Apakah anda yakin akan menghapus :field? Silahkan konfirmasi penghapusan dengan mencentang kolom konfirmasi.',['field' => $field])}}</p>
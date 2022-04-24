@props(['pageTitle' => null, 'usePageHeader' => true])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-layouts.parts.head>{{ $pageTitle ?? 'Page Title' }}</x-layouts.parts.head> 
    </head>
    <body class="pace-top">
        <x-elements.page-loader/>
        <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">  
            <x-layouts.parts.header/>
            <x-layouts.parts.sidebar/>
            <div id="content" class="content">
                @if ($pageTitle && $usePageHeader)
                    <h1 class="page-header">{{ $pageTitle }}</h1>
                @endif
                {{ $slot }}
            </div>
            <x-elements.page-footer/>            
            <x-elements.to-top/>            
        </div>
        <x-layouts.parts.js-page/>
    </body>
</html>

<!-- ================== BEGIN BASE JS ================== -->
@livewireScripts
<script src="/assets/vendor/alpinejs/alpine.js" defer></script>
<script src="{{ mix('assets/js/core.js') }}"></script>
<script src="{{ mix('assets/js/main.js') }}"></script>

<!-- ================== END BASE JS ================== -->
@stack('modals')
@stack('scripts')
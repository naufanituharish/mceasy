
@props([
    'models' => null, 
    'countText' => 'Menampilkan data :first sampai :last dari :total hasil',
    'displayCount' => false, 
    'displayLink' => false])
<div class="d-block d-md-flex align-items-center my-3">
    @if ($displayCount)
        <div class="d-flex">
            <div class="text-muted f-s-12">
                {{ __($countText,[
                    'first' => $models->count() ? $models->firstItem() : 0,
                    'last' => $models->count() ? $models->lastItem() : 0,
                    'total' => $models->total()
                ])}}
            </div>
        </div>
    @endif
    @if ($displayLink)
        <div class="ml-auto d-block">
            {{ $models->onEachSide(1)->links() }}
        </div>
    @endif
</div>
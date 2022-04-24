<div>
    @if (!empty($extraComponent))
        <div class="mb-2">
            <x-elements.formatted-data :dataProps="$extraComponent"/>
        </div>
    @endif

    <x-table.options
        :tableName="$this->tableName"
        :paginationEnabled="$this->paginationEnabled"
        :searchEnabled="$this->searchEnabled"
        :searchWidth="$this->searchWidth"
        :displayPerpage="$this->displayPerpage"
        :perPageOptions="$this->perPageOptions"
        :searchPlaceHolder="$this->searchPlaceHolder"
        :filterField="$filters"
    />
    <div class="{{ $this->getTableConfig('responsive') ? 'table-responsive' : ''}}">
        <div class="loader-base" wire:loading.class="loader-loading">
            <div class="loader-loader" wire:loading><span class="spinner-small"></span></div>
            <x-table.base :class="$this->getTableConfig('tableClass')" :style="$this->getTableConfig('tableStyle')" :extraAttributes="$this->getTableExtraAttributes()">
                <thead>
                    <x-table.head :columns="$extraHeaderColumns" :class="$this->getTableConfig('extraHeadClass')" :isExtra="true"/>
                    @if ($this->getTableConfig('headerEnabled'))
                        <x-table.head :columns="$columns" :class="$this->getTableConfig('headClass')"/>
                    @endif
                </thead>
                <x-table.body :models="$models" :columns="$columns" :bodyClass="$this->getTableConfig('bodyClass')"/>
                <tfoot>
                    <x-table.head :columns="$footerColumns" :class="$this->getTableConfig('footerClass')"/>
                </tfoot>
            </x-table.base>
        </div>
    </div>
    @if ($this->paginationEnabled)
        <x-table.pagination 
            :models="$models"
            :countText="$this->countText"
            :displayCount="$this->displayCount"
            :displayLink="$this->displayLink"/>
    @endif

    @if (!empty($extraComponentBottom))
        <div class="mt-2">
            <x-elements.formatted-data :dataProps="$extraComponentBottom"/>
        </div>
    @endif
</div>
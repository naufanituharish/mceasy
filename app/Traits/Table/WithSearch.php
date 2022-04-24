<?php

namespace App\Traits\Table;

/**
 * Trait WithSearch.
 */
trait WithSearch
{
    /**
     * The initial search string.
     * @var string
     */
    public $search = '';

    /**
     * Search placeholder.
     * @var string
     */
    public $searchPlaceHolder = 'Cari';

    /**
     * Whether or not searching is enabled.
     * @var bool
     */
    public $searchEnabled = true;

    /**
     * Define Search Input Width.
     * @var bool
     */
    public $searchWidth = 180;

    /**
     * Resets the search string.
     */
    public function clearSearch(): void
    {
        $this->reset('search');
    }

    /**
     * Resetting Searching After Changing the Search.
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }
}

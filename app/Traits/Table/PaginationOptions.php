<?php

namespace App\Traits\Table;

/**
 * Trait Pagination.
 */
trait PaginationOptions
{
    /**
     * Displays per page and pagination links.
     * @var bool
     */
    public $paginationEnabled = true;

    /**
     * Displays indexed Row Number.
     * @var bool
     */
    public $useIndex = true;


    /**
     * Displays indexed Row Number.
     * @var bool
     */
    public $indexWithoutHead = false;

    /**
     * Displays Perpage.
     * @var bool
     */
    public $displayPerpage = true;

    /**
     * Displays Pagination Count.
     * @var bool
     */
    public $displayCount = true;

    /**
     * Pagination Text.
     * @var string
     */
    public $countText = 'Menampilkan data :first sampai :last dari :total hasil';

    /**
     * Displays Perpage Link.
     * @var bool
     */
    public $displayLink = true;

    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public $perPageOptions = [10, 25, 50, 100];

    /**
     * Amount of items to show per page.
     * @var int
     */
    public $perPage = 10;

    
    /**
     * Resetting Pagination After Changing the perPage.
     */
    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

}

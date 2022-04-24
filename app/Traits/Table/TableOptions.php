<?php

namespace App\Traits\Table;
use Illuminate\Support\Arr;

/**
 * Trait TableOptions.
 */
trait TableOptions
{
    /**
     * @var array
     */
    protected $tableConfig = [];

    /**
     * @var array
     */
    protected $tableExtraAttributes = [];

    /**
     * @var array
     */
    protected $tableConfigDefault = [
        'headerEnabled'     => true,
        'footerEnabled'     => false,
        'responsive'        => true,
        'tableClass'        => '',
        'bodyClass'         => '',
        'tableStyle'        => '',
        'headClass'         => ' table-active',
        'extraHeadClass'    => '',
        'footerClass'       => '',
        'hover'             => false,
        'small'             => false,
        'striped'           => false,
        'bordered'          => true
    ];

    /**
     * @param  array  $overrides
     */
    protected function setTableConfig(array $overrides = []): void
    {
        foreach ($overrides as $key => $value) {
            data_set($this->tableConfigDefault, $key, $value);
        }
        $this->setTableClass();
    }

    public function getTableConfig($option)
    {
        return Arr::get($this->tableConfigDefault, $option, null);
    }

    public function getTableExtraAttributes()
    {
        return $this->tableExtraAttributes;
    }

    public function setTableClass()
    {
        $tableClass = $this->getTableConfig('tableClass');
        if($this->getTableConfig('hover')) $tableClass .= ' table-hover';
        if($this->getTableConfig('small')) $tableClass .= ' table-sm';
        if($this->getTableConfig('striped')) $tableClass .= ' table-striped';
        if($this->getTableConfig('bordered')) $tableClass .= ' table-bordered';
        data_set($this->tableConfigDefault, 'tableClass', $tableClass);
    }
}

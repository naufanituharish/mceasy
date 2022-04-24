<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class MenuItem extends Component
{
    /**
     * The list data.
     *
     * @var array
     */
    public $menus;

    /**
     * The active state.
     *
     * @var bool
     */
    public $hasParent;

    /**
     * The active state.
     *
     * @var string
     */
    public $active;

    /**
     * Url data.
     *
     * @var string
     */
    public $url;

    /**
     * Has Sub State.
     *
     * @var string
     */
    public $hasSub;

    /**
     * Caret data.
     *
     * @var bool
     */
    public $caret;

    /**
     * Icon data.
     *
     * @var string
     */
    public $icon;

    /**
     * Image data.
     *
     * @var string
     */
    public $img;

    /**
     * Title.
     *
     * @var string
     */
    public $title;

    /**
     * Label.
     *
     * @var string
     */
    public $label;
    
    /**
     * Badge.
     *
     * @var string
     */
    public $badge;

    /**
     * Highlight.
     *
     * @var bool
     */
    public $highlight;

    /**
     * Children Data .
     *
     * @var array
     */
    public $children;

    /**
     * Visible.
     *
     * @var bool
     */
    public $is_visible;

    /**
     * Sparator.
     *
     * @var bool
     */
    public $is_sparator;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( array $menus = null, bool $hasParent = false )
    {
        $this->menus = $menus;
        $this->hasParent = $hasParent;
        $this->url = $menus['children'] ? 'javascript:;': ($menus['url'] ?? 
            ($menus['route_name'] === 'javascript:;' ? 'javascript:;' : 
            ($menus['route_name'] || $menus['route_name'] !== '' ? 
            (Route::has($menus['route_name']) ? route($menus['route_name']) : 'javascript:;') : 'javascript:;')));
        $this->hasSub = $menus['children'] ? 'has-sub' : '';
        $this->caret = $menus['children'] ? true : false;
        $this->icon = $menus['icon'];
        $this->img = $menus['img'];
        $this->title = $menus['title'];
        $this->label = $menus['label'];
        $this->highlight = $menus['highlight'];
        $this->children = $menus['children'];
        $this->active = $menus['active'] ?? '';
        $this->is_visible = $menus['is_visible'];
        $this->is_sparator = $menus['is_sparator'];
        $this->badge = $menus['badge'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.elements.sidebar-menu');
    }
}
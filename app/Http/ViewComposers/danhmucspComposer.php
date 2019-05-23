<?php

namespace App\Http\ViewComposers;

use App\DanhMucSP;
use Illuminate\View\View;

class danhmucspComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $danhmucspComposer;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(DanhMucSP $danhmucsp)
    {
        // Dependencies automatically resolved by service container...
        $this->danhmucspComposer = $danhmucsp;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $view->with('nhomspComposer', $this->nhomspComposer->pluck('TenNSP','MaNSP'));
        $view->with('danhmucspComposer', $this->danhmucspComposer->all());
    }
}
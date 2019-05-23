<?php

namespace App\Http\ViewComposers;

use App\NhomSP;
use Illuminate\View\View;

class nhomspComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $nhomspComposer;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(NhomSP $nhomSP)
    {
        // Dependencies automatically resolved by service container...
        $this->nhomspComposer = $nhomSP;
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
        $view->with('nhomspComposer', $this->nhomspComposer->all());
    }
}
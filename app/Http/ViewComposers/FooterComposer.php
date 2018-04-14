<?php

namespace App\Http\ViewComposers;

use App\Sponsor;
use Illuminate\View\View;

class FooterComposer
{
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'sponsors' => Sponsor::inRandomOrder()->get(),
        ]);
    }
}
<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Tag;
class FooterComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', Tag::orderBy('name', 'ASC')
            ->get());
    }

}
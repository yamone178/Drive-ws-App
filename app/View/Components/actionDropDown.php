<?php

namespace App\View\Components;

use Illuminate\View\Component;

class actionDropDown extends Component
{
    public  $modalId ,  $acionMethod ,$destroyRoute, $id,  $downloadRoute, $destroyFormName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $acionMethod, $destroyRoute, $id, $downloadRoute, $destroyFormName)
    {
        $this->modalId = $modalId;
        $this->acionMethod = $acionMethod;
        $this->destroyRoute = $destroyRoute;
        $this->id = $id;
        $this->downloadRoute = $downloadRoute;
        $this->destroyFormName = $destroyFormName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action-drop-down');
    }
}

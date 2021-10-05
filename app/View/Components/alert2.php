<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert2 extends Component
{
   /**
    * Create a new component instance.
    *
    * @return void
    */
   public $color;

   public function __construct($color = 'red')
   {
      $this->color = $color;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
      return view('components.alert2');
   }
}

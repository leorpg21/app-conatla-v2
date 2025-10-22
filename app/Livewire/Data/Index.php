<?php

namespace App\Livewire\Data;

use Livewire\Component;

class Index extends Component
{

    public $formSelected = 'rumv';

    public function render()
    {
        return view('livewire.data.index');
    }
}

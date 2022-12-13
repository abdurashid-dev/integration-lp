<?php

namespace App\Http\Livewire\Technology;

use App\Models\Technology;
use Livewire\Component;
use Livewire\WithPagination;

class TechnologyTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $technologies = Technology::search($this->search)->latest('id')->paginate(10);
        return view('livewire.technology.technology-table', compact('technologies'));
    }
}

<?php

namespace App\Http\Livewire\Technology;

use App\Models\Technology;
use Livewire\Component;
use Livewire\WithPagination;

class TechnologyTable extends Component
{
    use WithPagination;

    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updateOrder($technologies)
    {
        foreach ($technologies as $technology) {
            Technology::findOrFail($technology['value'])->update(['order' => $technology['order']]);
        }
        $this->emit('toast', [
            'type' => 'success',
            'message' => "Sorted!",
        ]);
    }

    public function render()
    {
        $technologies = Technology::search($this->search)->orderBy('order')->paginate($this->perPage);
        return view('livewire.technology.technology-table', compact('technologies'));
    }
}

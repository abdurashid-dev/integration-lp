<?php

namespace App\Http\Livewire\Platform;

use App\Models\Platform;
use Livewire\Component;
use Livewire\WithPagination;

class PlatformTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $platforms = Platform::search($this->search)->latest('id')->paginate(10);
        return view('livewire.platform.platform-table', compact('platforms'));
    }
}

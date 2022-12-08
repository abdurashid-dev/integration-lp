<?php

namespace App\Http\Livewire\Package;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class PackageTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $packagies = Package::search($this->search)->latest('id')->paginate(20);
        return view('livewire.package.package-table', compact('packagies'));
    }
}

<?php

namespace App\Http\Livewire\Package;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class PackageTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public function updateOrder($packages)
    {
        foreach ($packages as $package) {
            Package::findOrFail($package['value'])->update(['order' => $package['order']]);
        }
        $this->emit('toast', [
            'type' => 'success',
            'message' => "Sorted!",
        ]);
    }

    public function render()
    {
        $packages = Package::search($this->search)->where('status', 1)->orderBy('order')->paginate($this->perPage);
        return view('livewire.package.package-table', compact('packages'));
    }
}

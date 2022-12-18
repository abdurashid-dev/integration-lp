<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UserDropdown extends Component
{
    protected $listeners = ['UserDataChanged' => '$refresh'];
    public function render()
    {
        return view('livewire.admin.user-dropdown')->layout('admin.layouts.app');
    }
}

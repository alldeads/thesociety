<?php

namespace App\Http\Livewire\Role;

use App\Http\Livewire\CustomComponent;

use App\Models\CompanyRole;
use App\Models\User;

use Carbon\Carbon;

class Read extends CustomComponent
{
    public $listeners = [
        'readRoleItem' => 'read'
    ];

    public $item;
    public $el = "modal-role-read";
    public $inputs = [];

    public function read($item)
    {
        $this->item = $item;

        $created = User::find($this->item['item']['created_by']);
        $updated = User::find($this->item['item']['updated_by']);

        $this->inputs = [
            'name'          => $this->item['item']['role_name'],
            'created_by'    => $created->profile->name ?? "N/A",
            'created_at'    => Carbon::parse($this->item['item']['created_at'])->format('F j, Y h:i:s a'),
            'updated_by'    => $updated->profile->name ?? "N/A",
            'updated_at'    => Carbon::parse($this->item['item']['updated_at'])->format('F j, Y h:i:s a'),
        ];

        $this->emit('showModal', ['el' => $this->el]);
    }

    public function render()
    {
        return view('livewire.role.read');
    }
}

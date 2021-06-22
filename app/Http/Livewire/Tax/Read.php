<?php

namespace App\Http\Livewire\Tax;

use Livewire\Component;

use App\Models\User;

use Carbon\Carbon;

class Read extends Component
{
    public $listeners = [
        'readTaxItem' => 'read'
    ];

    public $el = "modal-tax-read";
    public $inputs = [];

    public function read($item)
    {
        $created = User::find($item['item']['created_by']);
        $updated = User::find($item['item']['updated_by']);

        $this->inputs = [
            'tax_name'      => $item['item']['name'],
            'percentage'    => $item['item']['percentage'],
            'created_by'    => $created->profile->name ?? "N/A",
            'created_at'    => Carbon::parse($item['item']['created_at'])->format('F j, Y h:i:s a'),
            'updated_by'    => $updated->profile->name ?? "N/A",
            'updated_at'    => Carbon::parse($item['item']['updated_at'])->format('F j, Y h:i:s a'),
        ];

        $this->emit('showModal', ['el' => $this->el]);
    }

    public function render()
    {
        return view('livewire.tax.read');
    }
}

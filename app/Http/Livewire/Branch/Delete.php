<?php

namespace App\Http\Livewire\Branch;

use App\Http\Livewire\CustomComponent;

use App\Models\Branch;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteBranchAccount' => 'delete'
    ];

    public $branch;
    public $el = "delete-branch-item";

    public function delete($branch)
    {
        $this->branch = $branch;
        $this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
        $branch = Branch::find($this->branch['branch']['id']);

        if ( !$branch ) {
            $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
        }

        $branch->updated_by = auth()->id();
        $branch->save();
        $branch->delete();

        $this->emit('dissmissModal', ['el' => $this->el]);
        $this->message('Success! Branch has been deleted.', 'success');
        $this->emit('refreshBranchParent');
    }

    public function render()
    {
        return view('livewire.branch.delete');
    }
}

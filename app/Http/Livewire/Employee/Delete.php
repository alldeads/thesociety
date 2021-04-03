<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;
use App\Models\Employee;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteEmployee' => 'delete'
    ];

    public $employee;
    public $el = "delete-employee-item";

    public function delete($employee)
    {
    	$this->employee = $employee;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$emp = Employee::find($this->employee['employee']['id']);

    	if ( !$emp ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $emp->updated_by = auth()->id();
        $emp->save();
    	$emp->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Employee has been deleted.', 'success');
    	$this->emit('refreshEmployeeParent');
    }

    public function render()
    {
        return view('livewire.employee.delete');
    }
}

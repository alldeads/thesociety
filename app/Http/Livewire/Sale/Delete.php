<?php

namespace App\Http\Livewire\Sale;

use App\Http\Livewire\CustomComponent;

use App\Models\SalesOrder;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteSalesOrderItem' => 'delete'
    ];

    public $sales;
    public $el = "delete-sales-order-item";

    public function delete($sales)
    {
        $this->sales = $sales;
        $this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
        $sales = SalesOrder::find($this->sales['sales']['id']);

        if ( !$sales ) {
            $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
        }

        $sales->updated_by = auth()->id();
        $sales->save();
        $sales->delete();

        $this->emit('dissmissModal', ['el' => $this->el]);
        $this->message('Success! Sales Order has been deleted.', 'success');
        $this->emit('refreshSalesOrderParent');
    }

    public function render()
    {
        return view('livewire.sale.delete');
    }
}

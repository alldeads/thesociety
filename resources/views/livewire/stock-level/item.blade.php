<tr>
    <td>{{ $item->reference }}</td>
    <td>{{ $item->branch->name }}</td>
    <td>{{ $item->product->name }}</td>
    <td>{{ $item->in_stock }}</td>
    <td>{{ \Carbon\Carbon::parse($item->purchase_date)->format('F j, Y') }}</td>

    @if( auth()->user()->can('stock_level.update') || auth()->user()->can('stock_level.delete') || auth()->user()->can('stock_level.read') )
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                    @can('stock_level.update')
                        <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
                            <i class="fas fa-pen mr-1"></i>
                            <span>Edit</span>
                        </a>
                    @endcan

                    @can('stock_level.read')
                        <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
                            <i class="fas fa-eye mr-1"></i>
                            <span>View</span>
                        </a>
                    @endcan

                    @can('stock_level.delete')
                        <a class="dropdown-item" wire:click="delete" href="javascript:void(0);">
                            <i class="fas fa-trash mr-1"></i>
                            <span>Delete</span>
                        </a>
                    @endcan
                </div>
            </div>
        </td>
    @endif
</tr>
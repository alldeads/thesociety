<tr>
    <td>{{ $item->reference }}</td>
    <td>{{ $item->reason->name }}</td>
    <td>{{ $item->branch->name }}</td>
    <td>{{ $item->product->name }}</td>
    <td>{{ $item->in_stock }}</td>
    <td>{{ $item->on_hand }}</td>

    @if( $item->type == 1 )
        <td>{{ $item->difference }} <span class="text-success fas fa-long-arrow-alt-up"></span></td>
    @else
        <td>{{ $item->difference }} <span class="text-danger fas fa-long-arrow-alt-down"></span></td>
    @endif

    
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}</td>


    @if( auth()->user()->can('stock_level.read') )
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                    @can('stock_level.read')
                        <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
                            <i class="fas fa-eye mr-1"></i>
                            <span>View</span>
                        </a>
                    @endcan
                </div>
            </div>
        </td>
    @endif
</tr>
<tr>
    <td>{{ $item->reference }}</td>
    <td>{{ $item->reason->name }}</td>
    <td>{{ $item->branch->name }}</td>
    <td>{{ $item->product->name }}</td>
    <td>{{ $item->in_stock }}</td>
    <td>{{ $item->on_hand }}</td>

    <td wire:ignore>
        <div class="d-flex align-items-center">
            <span class="font-weight-bolder mr-1">{{ $item->difference }}</span>
            @if ( $item->type == 1 )
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up text-success font-medium-1"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down text-danger font-medium-1"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>
            @endif
        </div>
    </td>

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
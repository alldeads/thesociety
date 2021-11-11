<tr>
    <td> <a href="#" wire:click.prevent="read"> {{ $item->reference }} </a></td>
    <td>{{ $item->customer->user->profile->name ?? 'Guest Customer' }}</td>
    <td>{{ $item->quantity }}</td>
    <td>{{ number_format($item->total, 2, '.', ',') }}</td>

    @if ( !isset($item->payment_balance->balance) )
        <td>
            <span class="badge badge-light-danger badge-pill"> {{ number_format($item->total, 2, '.', ',') }} </span>
        </td>
    @elseif ($item->payment_balance->balance > -1)
        <td>-</td>
    @else
        <td>
            <span class="badge badge-light-danger badge-pill"> {{ number_format(abs($item->payment_balance->balance), 2, '.', ',') }} </span>
        </td>
    @endif

    @if ( $item->status == "cancelled" )
        <td>
            <span class="badge badge-light-danger badge-pill"> {{ ucwords($item->status) }} </span>
        </td>
    @elseif ( $item->status == "pending" )
        <td>
            <span class="badge badge-light-primary badge-pill"> {{ ucwords($item->status) }} </span>
        </td>
    @else
        <td>
            <span class="badge badge-light-success badge-pill"> {{ ucwords($item->status) }} </span>
        </td>
    @endif
    
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y h:i:s a') }}</td>

    @if( auth()->user()->can('sale.update') || auth()->user()->can('sale.delete') || auth()->user()->can('sale.read') )
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                    @can('sale.update')
                        <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
                            <i class="fas fa-pen mr-1"></i>
                            <span>Edit</span>
                        </a>
                    @endcan

                    @can('sale.read')
                        <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
                            <i class="fas fa-eye mr-1"></i>
                            <span>View</span>
                        </a>
                    @endcan

                    @can('sale.delete')
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
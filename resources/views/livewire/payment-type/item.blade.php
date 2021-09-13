<tr>
    <td>{{ $item->id }}</td>
    <td>{{ ucwords($item->name) }}</td>
    <td>{{ ucwords($item->type) }}</td>
    <td>
        <span class="badge badge-pill  badge-light-{{ $item->status == "active" ? "success" : "danger" }}">
            {{ ucwords($item->status) }}
        </span>
    </td>

    @if( auth()->user()->can('payment_type.update') || auth()->user()->can('payment_type.delete') )

        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                    @can('payment_type.update')
                        <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
                            <i class="fas fa-pen mr-1"></i>
                            <span>Edit</span>
                        </a>
                    @endcan

                    @can('payment_type.delete')
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
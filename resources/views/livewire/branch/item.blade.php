<tr>
    <td>{{ ucwords($item->name) }}</td>
    <td>{{ $item->phone }}</td>
    <td>0</td>

    @if( auth()->user()->can('branch.update') || auth()->user()->can('branch.delete') || auth()->user()->can('branch.read') )

        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                    @can('branch.update')
                        <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
                            <i class="fas fa-pen mr-1"></i>
                            <span>Edit</span>
                        </a>
                    @endcan

                    @can('branch.read')
                        <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
                            <i class="fas fa-eye mr-1"></i>
                            <span>View</span>
                        </a>
                    @endcan

                    @can('branch.delete')
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
<tr>
    <td>
        <a href="#" wire:click.prevent="read"> {{ $item->id }} </a>
    </td>
    <td>{{ ucwords($item->first_name) }}</td>
    <td>{{ ucwords($item->last_name) }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ \Carbon\Carbon::parse($item->date_visited)->format('F j, Y') }}</td>

    @if( auth()->user()->can('covid.delete') || auth()->user()->can('covid.read') )
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">

                    @can('journal_entry.read')
                        <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
                            <i class="fas fa-eye mr-1"></i>
                            <span>View</span>
                        </a>
                    @endcan

                    @can('journal_entry.delete')
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
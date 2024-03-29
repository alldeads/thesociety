<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        @can('stock_level.create')
                            <button type="button" class="btn btn-primary rounded" wire:click="create" wire:ignore>
                                <i data-feather="plus" class="mr-25"></i>
                                <span>Create</span>
                            </button>
                        @endcan

                        @can('stock_level.export')
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-download mr-1"></i>
                                    <span>{{ __('Export') }}</span>
                                </button>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('stock-levels-export', [
                                        'type' => 'csv',
                                        'q'    => $this->search,
                                        'from' => $this->date_from,
                                        'to'   => $this->date_to
                                    ]) }}" target="_blank">
                                        <span>{{ __('CSV') }}</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('stock-levels-export', [
                                        'type' => 'xls',
                                        'q'    => $this->search,
                                        'from' => $this->date_from,
                                        'to'   => $this->date_to
                                    ]) }}" target="_blank">
                                        <span>{{ __('EXCEL (xls)') }}</span>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('stock-levels-export', [
                                        'type' => 'xlsx',
                                        'q'    => $this->search,
                                        'from' => $this->date_from,
                                        'to'   => $this->date_to
                                    ]) }}" target="_blank">
                                        <span>{{ __('EXCEL (xlsx)') }}</span>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('stock-levels-export', [
                                        'type' => 'pdf',
                                        'q'    => $this->search,
                                        'from' => $this->date_from,
                                        'to'   => $this->date_to
                                    ]) }}" target="_blank">
                                        <span>{{ __('PDF') }}</span>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('stock-levels-export', [
                                        'type' => 'ods',
                                        'q'    => $this->search,
                                        'from' => $this->date_from,
                                        'to'   => $this->date_to
                                    ]) }}" target="_blank">
                                        <span>{{ __('ODS') }}</span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10 col-12 mt-1">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search reference no, product, and branch" wire:model="search"/>
                            </div>
                        </div>

                        <div class="col-md-2 col-12 mt-1">
                            <div class="form-group">
                                <select class="form-control" wire:model="limit">
                                    <option value="10">{{ __('10 entries') }}</option>
                                    <option value="25">{{ __('25 entries') }}</option>
                                    <option value="50">{{ __('50 entries') }}</option>
                                    <option value="100">{{ __('100 entries') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Branch</th>
                                <th>Quantity</th>
                                <th>Updated At</th>
                                @if( auth()->user()->can('stock_level.update') || auth()->user()->can('stock_level.delete') || auth()->user()->can('stock_level.read') )
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results as $result)
                                @livewire('stock-level.item', ['item' => $result], key($result->id))
                            @empty
                                <tr class="text-center">
                                    <td colspan="7"> {{ __('No items found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="m-auto">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>

    @livewire('stock-level.delete')
</div>

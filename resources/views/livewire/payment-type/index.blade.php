<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    @can('payment_type.create')
                        <button type="button" class="btn btn-primary rounded" wire:click="create" wire:ignore>
                            <i data-feather="plus" class="mr-25"></i>
                            <span>{{ __('Create') }}</span>
                        </button>
                    @endcan
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-10 col-sm-12 mt-1">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search name, status, or type" wire:model="search"/>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-12 mt-1">
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            @if( auth()->user()->can('payment_type.update') || auth()->user()->can('payment_type.delete') )
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $key => $result)
                            @livewire('payment-type.item', ['item' => $result], key($result->id))
                        @empty
                            <tr class="text-center">
                                <td colspan="6"> {{ __('No items found.') }}</td>
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

    {{-- @livewire('payment-type.delete', ['company_id' => $company_id]) --}}
</div>


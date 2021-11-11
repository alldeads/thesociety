
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('partials.card-body')

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Created At</th>
                            @if( auth()->user()->can('sale.update') || auth()->user()->can('sale.delete') || auth()->user()->can('sale.read') )
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $result)
                            @livewire('sale.item', ['item' => $result], key($result->id))
                        @empty
                            <tr class="text-center">
                                <td colspan="5"> {{ __('No items found.') }}</td>
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

    @livewire('sale.delete')
</div>

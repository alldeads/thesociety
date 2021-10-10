<div class="row">
    <div class="col-12">
        <div class="card">
            @include('partials.card-body')

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Date Visited</th>
                            @if( auth()->user()->can('covid.delete') || auth()->user()->can('covid.read') )
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $result)
                            @livewire('covid.item', ['item' => $result], key($result->id))
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

    @livewire('covid.delete')
</div>

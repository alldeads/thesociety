<div class="row">
    <div class="col-12">
      <div class="card">

          @include('partials.card-body')

            <div class="table-responsive">
              <table class="table table-hover">
                    <thead>
                      <tr>
                          <th>Date</th>
                          <th>Payee/Payor</th>
                          <th>Title</th>
                          <th>Amount</th>
                          @if( auth()->user()->can('accounts_payable.update') || auth()->user()->can('accounts_payable.delete') || auth()->user()->can('accounts_payable.read'))
                              <th>Actions</th>
                          @endif
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $key => $result)
                            @livewire('accounts-payable.item', ['item' => $result], key($result->id))
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

    {{-- @livewire('expense.delete', ['company_id' => $company_id]) --}}
</div>
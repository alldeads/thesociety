<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{ __(ucwords($column)) }}</th>
                @endforeach
                
                @if($hasPermissions)
                    <th>{{ __('Actions') }}</th>
                @endif
            </tr>
        </thead>
          <tbody>
              @forelse($results as $result)
                  @livewire($baseView . '.item', ['account' => $result], key($result->id))
              @empty
                  <tr class="text-center">
                      <td colspan="{{ $columnCount }}"> {{ __('No items found.') }}</td>
                  </tr>
              @endforelse
          </tbody>
    </table>
</div>

<div class="m-auto">
    {{ $results->links() }}
</div>

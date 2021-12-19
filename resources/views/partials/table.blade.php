<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{ __(ucwords($column['label'])) }}</th>
                @endforeach
                
                @if($hasPermissions)
                    <th>{{ __('Actions') }}</th>
                @endif
            </tr>

            <tr>
                @foreach($columns as $column)
                    <th>
                        @if($column['type'] === "text" || $column['type'] === "number" )
                            <input type="{{ $column['type'] }}" class="form-control" placeholder="Enter {{ $column['label'] }}" wire:model.debounce.500ms="filters.{{ $column['label'] }}"/>
                        @else
                            <select class="form-control" wire:model="filters.{{ $column['label'] }}">
                                <option></option>
                                @foreach ($column['values'] as $value)
                                    <option value="{{ $value }}"> {{ ucwords($value) }}</option>
                                @endforeach
                            </select>
                        @endif
                    </th>
                @endforeach

                <th></th>
            </tr>
        </thead>
          <tbody>
              @forelse($results as $result)
                    @livewire($baseView . '.item', [
                        'account'        => $result,
                        'permission'     => $permission,
                        'hasPermissions' => $hasPermissions
                    ], key($result->id))
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

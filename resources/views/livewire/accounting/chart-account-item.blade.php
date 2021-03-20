<tr>
	<td>{{ $account->code }}</td>
	<td>{{ $account->name }}</td>
	<td>{{ $account->type->name }}</td>
	<td>
        <div class="dropdown">
            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                <i data-feather="more-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);">
                    <i data-feather="edit-2" class="mr-50"></i>
                    <span>Edit</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0);">
                    <i data-feather="trash" class="mr-50"></i>
                    <span>Delete</span>
                </a>
            </div>
        </div>
    </td>
</tr>
<form action="{{ route('dashboard.admins.destroy', $id) }}" method="post">
    @csrf
    @method('delete')

    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
</form>

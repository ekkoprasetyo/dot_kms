<button type="button" onclick="editModal('{{ $position->c_position_id }}','{{route('position.edit')}}')" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></button>
<button type="button" onclick="deleteModal('{{ $position->c_position_id }}','{{route('position.delete')}}')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
<div class="modal fade" id="deleteMenuModal{{ $menuItem->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Delete
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-4">
                Are you sure you want to delete <strong>{{ $menuItem->menu_name }}</strong>?
                <p class="text-muted small mb-0 mt-2">Child menu items under this menu will also be affected.</p>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <form action="{{ route('menu.destroy', $menuItem->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm shadow-sm px-4">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

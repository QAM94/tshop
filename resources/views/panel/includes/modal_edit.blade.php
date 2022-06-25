<div class="modal fade" id="editModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title mt-1">Edit {{ setText($module,true) }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4 modal_empty" id="edit-{{ $module }}">

            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
<script type="text/javascript">
    function openEditModal(id) {
        $.ajax({
            method: "GET",
            url: base_url + '/{{ $module }}-edit/' + id,
            async: false
        }).done(function (data) {
            $('#edit-{{ $module }}').html(data);
            $('#editModal').modal('show');
        }).fail(function (err) {
            console.log(err);
        });
    }
</script>
@endpush

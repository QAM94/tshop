<div class="modal fade" id="viewModal"  role="dialog" aria-labelledby="exampleModalLabel5"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title mt-1" id="exampleModalLabel5">View Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" id="view-{{ $module }}">
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script type="text/javascript">
        function viewRow(id) {
            $.ajax({
                method: "GET",
                url: base_url + '/{{ $module }}-view/' + id,
                async: false
            }).done(function (data) {
                $('#view-{{ $module }}').html(data);
                $('#viewModal').modal('show');
            }).fail(function (err) {
                console.log(err);
            });
        }
    </script>
@endpush

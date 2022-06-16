<!--//// modal ////-->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title mt-1">Change Password</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="change-password">
                <form class="w-100 d-inline-block" id="changePasswordForm" action="{{ route('users.change-password') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p style="color:red;" id="ajax-error"></p>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name" class="mb-1 d-block">Old Password</label>
                                <input type="password" name="old_password" id="old_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label for="contact" class="mb-1 d-block">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label for="address" class="mb-1 d-block">Confirm New Password</label>
                                <input type="password" id="confirm_new_password" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-12 text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script type="text/javascript">
        $(document).on('submit', '#changePasswordForm', function (event) {
            event.preventDefault();
            $("#ajax-error").val('');
            if($('#new_password').val() != $('#confirm_new_password').val()){
                $("#ajax-error").show('Password and Confirm Password donot match.');
                return false;
            }
            let form = $('#changePasswordForm');
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function (data) {
                    $("#ajax-error").val('');
                    $('#changePasswordModal').modal('hide');
                    form[0].reset();
                    Swal.fire(
                            'Success!',
                            'Password Changed Successfully!',
                            'success'
                    );
                }, error: function (err) {
                    $('#ajax-error').text(err.responseJSON.message);
                }
            });
        });
    </script>
@endpush
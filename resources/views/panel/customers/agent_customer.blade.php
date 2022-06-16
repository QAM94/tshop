<!DOCTYPE html>
<html lang="en">
@include('panel.includes.head')
<body>

<div class="container-fluid">
    <div class="row">
        <section class="w-100 d-flex">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form class="calc-height" action="{{ route($module.'.add') }}" method="POST" id="customerForm">
                            @csrf
                            <div class="fields-box">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <a href="javascript:" class="information-logo d-block">
                                            <img src="{{ asset('assets/img/new-black-logo.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="" class="mb-1 d-block">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="" class="mb-1 d-block">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number"
                                                   class="form-control"
                                                   placeholder="+555555555555">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="" class="mb-1 d-block">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="" class="mb-1 d-block">Receipt ID</label>
                                            <input type="text" class="form-control" name="receipt_id" id="receipt_id"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    {{--<div class="col-sm-12">--}}
                                        {{--<p class="pt-1">The information you're providing will help us sending you an--}}
                                            {{--awareness message in case of any product being recalled.</p>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success information-btn w-100" type="submit">Submit
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/// information button ///-->
            <a class="information-icon" href="#modal3" data-toggle="modal">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                     stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
            </a>
            <!--/// information button ///-->
        </section>
    </div>
</div>

<!--//// modal ////-->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog success-modal modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-center mb-3 mt-4">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <h3>Thank you for the information!</h3>
                {{--<p>We have generated an email listing all the reasons due to which we made you fill this form.</p>--}}
            </div>
        </div>
    </div>
</div>
<!--///-->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog information-modal modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="mt-4 mb-3">Keeping you safe is our top priority!</h3>
                <p>By filling the form, we will automatically send an awareness <strong>Email</strong> and
                    <strong>SMS</strong> for the product(s) being recalled.</p>
                <p>Your cooperation is needed.</p>
                <p>Thanks!</p>
            </div>
        </div>
    </div>
</div>

<!--//// modal ////-->

@include('panel.includes.scripts')
<script type="text/javascript">
    $("#email").focusout(function () {
        let email = $("#email").val();
        if(email != "") {
            $.ajax({
                type: 'GET',
                url: "{{ url('customers-get-info') }}/"+email,
                success: function (data) {
                    $("#phone_number").val(data.phone_number);
                    $("#name").val(data.name);
                }, error: function (err) {
                    showErrorMsgs(err);
                }
            });
        }
    });

    $(document).on('submit', '#customerForm', function (event) {
        event.preventDefault();
        removeAjaxMsgs();
        let form = $(this);
        let btn = form.find('.btn');
        btn.attr("disabled", true);
        btn.addClass('loader');
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#customerForm')[0].reset();
                btn.attr("disabled", false);
                btn.removeClass('loader');
                $('#modal2').modal('show');
            }, error: function (err) {
                btn.attr("disabled", false);
                btn.removeClass('loader');
                showErrorMsgs(err);
            }
        });
    });

</script>
</body>
</html>
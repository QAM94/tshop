<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('lib/pickerjs/picker.min.js') }}"></script>
<script src="{{ asset('lib/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('lib/jquery.flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('lib/jquery.flot/jquery.flot.resize.js') }}"></script>

<script src="{{ asset('lib/components-jqueryui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/js/dashforge.js') }}"></script>
<script src="{{ asset('assets/js/dashforge.aside.js') }}"></script>
<script src="{{ asset('assets/js/dashforge.sampledata.js') }}"></script>

<!-- append theme customizer -->
<script src="{{ asset('assets/js/js.cookie.js') }}"></script>

@if(Auth::check())

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>

        $(function () {
            'use strict';
            $('#example1').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page'
                }
            });

            $('.click-popup').on('click', function () {
                $('.message-box').toggleClass('open-message');
            });
            $('.message-box li a').on('click', function () {
                $('.message-box').removeClass('open-message');
            });

            $('.click-popup1').on('click', function () {
                $('.message-box1').toggleClass('open-message');
            });
            $('.message-box1 li a').on('click', function () {
                $('.message-box1').removeClass('open-message');
            });

            //// filter addClass & removeClass ////
            $('.add-class').on('click', function () {
                $('.filter-dropdown').toggleClass('filter-active');
            });
            // $('.remove-class').on('click', function(){
            //     $('.filter-dropdown').removeClass('filter-active');
            // });
            //// filter addClass & removeClass ////

            // $('#datepicker6').datepicker({
            //     numberOfMonths: 2
            // });

        });
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        var base_url = "{{ url('') }}";
        var _module = "{{ !empty($module) ? $module : '' }}";

        setInterval(function () {
            let request_url = base_url + '/check-auth';
            $.get(request_url).done(function (data) {
                if(data == 1) {
                    Swal.fire({
                        title: 'Time Out!',
                        text: "Your session has been timed out.",
                        type: 'error',
                        onClose: () => {
                            location.reload()
                        }
                    });
                }
            }).fail(function (err) {
                console.log(err);
            });
        }, 9000);

    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endif

@extends('panel.master')
@section('main')
    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                @include('flash::message')
                <div class="row row-xs mt-2">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <h4 id="section1" class="mg-b-15">User Profile</h4>
                        <form class="user-profile" method="post"
                              action="{{ route('users.update-profile',['id' => $data->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <img id="store_logo" src="{{ asset(isset($data->avatar->source) ? $data->user->avatar->source : 'assets/img/default-logo.png') }}" alt="">
                                    <label>
                                        <input id="file-upload2" name="logo" type="file"/>
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             class="css-i6dzq1">
                                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                            <circle cx="12" cy="13" r="4"></circle>
                                        </svg>
                                        @include('panel.includes.single_error',['name' => 'logo' ])
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="" class="mb-1 d-block tx-16">Contact Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="contact" id="contact" class="form-control tx-16"
                                               value="{{ $data->contact }}"
                                               placeholder="+555555555555">
                                        @include('panel.includes.single_error',['name' => 'contact' ])
                                    </div>
                                </div>
                                <!--///-->
                                <div class="col-md-4">
                                    <label for="" class="mb-1 d-block tx-16">Address</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control tx-16"
                                               placeholder=""
                                               value="{{ $data->address }}">
                                        @include('panel.includes.single_error',['name' => 'address' ])
                                    </div>
                                </div>
                                <!--///-->

                                <div class="col-md-4"></div>
                                <div class="col-md-8 text-right">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom-scripts')

    <script type="text/javascript">

        function readURL(input) {


            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#store_logo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-upload2").change(function () {
            readURL(this);
        });

    </script>

@endpush
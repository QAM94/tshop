@extends('panel.master')
@section('main')
    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="row row-xs mt-2">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <h4 id="section1" class="mg-b-15">Store Profile</h4>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form class="user-profile" method="post" action="{{ route('user.profile_update',['id' => auth()->user()->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <img id="store_logo" src="{{ asset(isset(auth()->user()->avatar->source) ? auth()->user()->avatar->source : 'assets/img/default-logo.png') }}" alt="">
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
                                    <label for="" class="mb-1 d-block tx-16">Store Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control tx-16"
                                               placeholder=""
                                               value="{{ auth()->user()->name }}">
                                        @include('panel.includes.single_error',['name' => 'name' ])
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="mb-1 d-block tx-16">Email ID</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control tx-16"
                                               placeholder=""
                                               value="{{ auth()->user()->email }}">
                                        @include('panel.includes.single_error',['name' => 'email' ])
                                    </div>
                                </div>

<!--                                <div class="col-md-4">
                                    <label for="" class="mb-1 d-block tx-16">Auto Recall Notifications</label>
                                </div>
                                <div class="col-md-8 d-flex align-items-center">
                                    <div class="custom-control custom-switch pl-0">
                                        <input type="hidden" name='auto_recall' value="0">
                                        <input type="checkbox" {{ auth()->user()->auto_recall ? 'checked' : '' }}
                                        class="custom-control-input" id="customSwitch2" name='auto_recall' value="1">
                                        <label for="customSwitch2" class="custom-control-label ml-3"></label>
                                    </div>
                                </div>-->
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
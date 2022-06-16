<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-md-12 add-logo text-center">
            <a href="javascript:" class="d-block">
                <img id="store_logo" src="{{ asset('assets/img/default-logo.png') }}" alt="">
            </a>
            <div class="mt-2 mb-2">
                <label for="file-upload2" class="custom-file-upload">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    Upload Logo
                </label>
                <input id="file-upload2" name="logo" type="file"/>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Store Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="email" class="mb-1 d-block">Email ID</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="contact" class="mb-1 d-block">Contact Number</label>
                <input type="text" name="contact" id="contact" class="form-control" placeholder="+555555555555">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="address" class="mb-1 d-block">Address</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-sm-6 d-flex align-items-center">
            <div class="custom-control custom-switch pl-0">
                <label for="customSwitch2" class="switch-active">Status</label>
                <input type="hidden" name='is_active' value="0">
                <input type="checkbox" class="custom-control-input" id="customSwitch2" name='is_active' value="1">
                <label for="customSwitch2" class="custom-control-label ml-3"></label>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>

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


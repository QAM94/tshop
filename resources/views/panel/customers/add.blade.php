<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Name</label>
                <input type="text" class="form-control" name="name" id="name" />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                       placeholder="+555555555555">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success w-100" type="submit">Submit</button>
        </div>
    </div>
</form>

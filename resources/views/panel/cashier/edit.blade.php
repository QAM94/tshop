<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder=""
                       value="{{ $data->name }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder=""
                       value="{{ $data->email }}">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success w-100" type="submit">Submit</button>
        </div>
    </div>
</form>

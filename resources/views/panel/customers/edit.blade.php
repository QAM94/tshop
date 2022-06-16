<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                       placeholder="+555555555555" value="{{ $data->phone_number }}">
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
                <label for="" class="mb-1 d-block">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $data->name }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Receipt ID</label>
                <input type="text" class="form-control" name="receipt_id" id="receipt_id" placeholder=""
                       value="{{ $data->receipt_id }}">
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success w-100" type="submit">Submit</button>
        </div>
    </div>
</form>

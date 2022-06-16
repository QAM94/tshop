<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder=""
                       value="{{ $data->name }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Message</label>
                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="">{{ $data->message }}</textarea>
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success w-100" type="submit">Submit</button>
        </div>
    </div>
</form>

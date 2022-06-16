<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.edit' , ['id' => $data->id]) }}"
      id="editForm">
    @csrf
    <div class="row ">
        <div class="form-group col-12 col-sm-6 col-lg-6">
            <h6>Title</h6>
            <input class="form-control" type="text" name="title" id="title"
                   placeholder="Enter Title" value="{{ $data->title }}">
        </div>
    </div>
    <div class="form-group pt-2">
        @include('panel.permissions.view')
    </div>
    <div class="form-buttons-w">
        <button class="btn btn-primary btn-rounded btn-lg" type="submit"> Submit
        </button>
    </div>
</form>

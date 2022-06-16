<form method="POST" action="{{ route($module.'.add') }}" id="addForm">
    @csrf
    <div class="row ">
        <div class="form-group col-12 col-sm-10 col-lg-10">
            <label for="inputEmail"><h6>Title</h6></label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" value="">
        </div>
    </div>
    <div class="form-group pt-2">
        @include('panel.permissions.show')
    </div>
    <div class="form-buttons-w">
        <button class="btn btn-primary btn-rounded btn-lg" type="submit"> Submit</button>
    </div>
</form>

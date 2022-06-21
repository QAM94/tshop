<form class="w-100 d-inline-block" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Parent</label>
                <select name="parent_id" id="parent_id" class="form-control sel2">
                    <option value="">None</option>
                    @foreach($categories as $category)
                        <option {{ $data->parent_id == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}" >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
            </div>
        </div>
        <div class="col-sm-6 d-flex align-items-center">
            <div class="custom-control custom-switch pl-0">
                <label for="customSwitch2" class="switch-active">Status</label>
                <input type="hidden" name='is_active' value="0">
                <input type="checkbox" {{ $data->is_active ? 'checked' : '' }} class="custom-control-input"
                       id="customSwitch2" name='is_active' value="1">
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

<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Parent</label>
                <select name="parent_id" id="parent_id" class="form-control sel2">
                    <option value="">None</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Title</label>
                <input type="text" name="title" id="title" class="form-control" />
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>


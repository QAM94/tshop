<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group"><label>Shop</label>
                <select class="form-control" name="shop_id" id="shop_id">
                    @foreach($shops as $shop)
                        <option {{ $data->shop->id == $shop->id ? 'selected' : '' }}
                                value="{{ $shop->id }}">
                            {{ $shop->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Name</label>
                <input type="text" name="name" id="name"
                       class="form-control" value="{{ $data->name }}"
                       placeholder="Enter Name">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       placeholder="Enter Email" value="{{ $data->email }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       placeholder="Enter Password">
                <small>Leave empty if unchanged</small>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Contact</label>
                <input type="text" id="contact" name="contact" class="form-control"
                       placeholder="Enter Contact (+xxxxxxxxxxx)"
                       value="{{ $data->contact }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label class="d-block">User Image</label>
                <img src="{{ getUserAvatar($data->id) }}" style="width: 100px;"
                     class="staff_img">
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success w-100" type="submit">Submit</button>
        </div>
    </div>
</form>

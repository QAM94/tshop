<form method="POST" action="{{ route($module.'.add') }}" id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group"><label>Shop</label>
                <select class="form-control sel2" name="shop_id" id="shop_id">
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">
                            {{ $shop->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Name</label>
                <input type="text" name="name" id="name"
                       class="form-control" placeholder="Enter Name">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       placeholder="Enter Email">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       placeholder="Enter Password">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>Contact</label>
                <input type="text" id="contact" name="contact" class="form-control"
                       placeholder="Enter Contact (+xxxxxxxxxxx)">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label>User Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-sm-12 text-right">
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
</form>

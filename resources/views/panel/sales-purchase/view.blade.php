<div class="layout-w">
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <div class="container col-lg-12">
                        <div class="element-wrapper">
                            <div class="element-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-border-color card-border-color-primary cus-card-bg">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p><b>Shop: </b>{{ $data->shop->name }}</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p><b>Customer: </b>{{ $data->customer->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row" style="border-bottom: 1px solid #bfbfbf;
                                                border-top: 1px solid #bfbfbf; padding-top: 10px;
                                                margin-bottom: 10px;">
                                                    <h6 class="col-sm-8">Product</h6>
                                                    <h6 class="col-sm-2">Quantity</h6>
                                                    <h6 class="col-sm-2">Price</h6>
                                                </div>
                                                @foreach($data->details as $row)
                                                    <div class="row">
                                                        <p class="col-sm-8">{{ $row->product->title }}
                                                            ({{ $row->product->price }}/{{ $row->product->inventory->measure.$row->product->inventory->unit }})</p>
                                                        <p class="col-sm-2">{{ $row->quantity }}</p>
                                                        <p class="col-sm-2">{{$currency}}{{ $row->price }}</p>
                                                    </div>
                                                @endforeach
                                                <div class="row" style="border-top: 1px solid #bfbfbf;
                                                padding-top: 10px;
                                                margin-bottom: 10px;">
                                                    <div class="col-sm-10" style="text-align: right;font-weight: bold;">Subtotal</div>
                                                    <div class="col-sm-2">{{$currency}}{{$data->sub_total }}</div>
                                                    <div class="col-sm-10" style="text-align: right;font-weight: bold;">Discount</div>
                                                    <div class="col-sm-2">{{$currency}}{{ $data->discount ? $data->discount : 0 }}</div>
                                                    <div class="col-sm-10" style="text-align: right;font-weight: bold;">Total</div>
                                                    <div class="col-sm-2">{{$currency}}{{ $data->total }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

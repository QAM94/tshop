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
                                        <button class="btn btn-primary" onclick="printReceipt();"
                                                style="float: right">
                                            <i class="fa fa-print"></i> Print
                                        </button>
                                    </div>
                                    <div class="col-lg-12" id="printDiv">
                                        <table border="0" style="width:60%; text-align: center">
                                            <tr>
                                                <td>
                                                    <h3>{{ $data->shop->name }}</h3>
                                                    {{ $data->shop->address }}<br/>
                                                    {{ $data->shop->email }}<br/>
                                                    {{ $data->shop->contact }}<br/>
                                                </td>
                                            </tr>
                                        </table>
                                        <table border="1" cellpadding="10" style="width:60%; border-collapse: collapse;">
                                            <tr>
                                                <td><b>Time</b><br/>
                                                    {{ date('H:i:s', strtotime($data->created_at))  }}
                                                </td>
                                                <td><b>Date</b><br/>
                                                    {{ date('Y m d', strtotime($data->created_at))  }}
                                                </td>
                                            </tr>
                                        </table>
                                        <br/>
                                        <table border="1" cellpadding="7" style="width:60%; border-collapse: collapse;">
                                            <tr>
                                                <th>BILL#</th>
                                                <th>ITEM</th>
                                                <th>QUANTITY</th>
                                                <th>PRICE</th>
                                                <th>TOTAL</th>
                                            </tr>
                                            @foreach($data->details as $row)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->product->title }}</td>
                                                    <td>{{ $row->yards }}</td>
                                                    <td>{{ number_format($row->unit_price, 2) }}</td>
                                                    <td>{{ number_format($row->price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <br/>
                                        <table border="1" cellpadding="5" style="width:60%; text-align: left;
                                        border-collapse: collapse;">
                                            <tr>
                                                <th>SUBTOTAL</th>
                                                <td>{{ number_format($data->sub_total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>DISCOUNT</th>
                                                <td>{{ number_format($data->discount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>TAX</th>
                                                <td>{{ number_format($data->vat, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>TOTAL</th>
                                                <td>{{ number_format($data->total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>ADVANCE</th>
                                                <td>{{ number_format($data->advance_payment, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>REMAINING</th>
                                                <td>{{ number_format($data->remaining_payment, 2) }}</td>
                                            </tr>
                                        </table>
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


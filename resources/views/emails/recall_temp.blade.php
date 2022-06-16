@include("emails.header")
<div style=" background: #22282f; padding: 20px 30px 50px 30px;">
    <a href="javascript:">
        <img src='{{ asset("assets/img/new-white-logo.png") }}' alt="" width="180px">
    </a>
    <h5 style="text-align: center; margin: 0; color: white; font-size: 46px; font-weight: 600;">Product Recall</h5>
    <h3 style="text-align: center; margin: 0; color: #52c60f; font-size: 51px; font-weight: 800; text-transform: uppercase;">
        Important Notice!</h3>
</div>
<div style="margin: 0 auto; padding:0 70px;width:80%;">
    <table style="width:100%;padding:50px 70px 20px; border-radius: 14px; background: white; box-shadow: 0 60px 80px 0 rgba(0, 0, 0, 0.35);">
        <tr style="display:table-row">
            <td style="padding:40px 0px 0px 0px;">
                <h5 style="color: #9c9c9c; font-size: 16px; margin: 0 0 10px 0;">Date:
                    <span>{{ date('M d, Y', strtotime($recall->recall_date)) }}</span></h5>
                <h2 style="color: #272424; font-size: 32px; margin: 0;">{{ $recall->product }}</h2>
            </td>
            <td style="padding:40px 0px 0px 0px;">
                <img src='{{ asset("assets/img/Alert.png") }}' alt="">
            </td>
        </tr>
        <tr>
            <td style="padding:40px 0px 0px 0px;" colspan="2">
                <h4 style="color: #404040; font-size: 18px; margin: 0 0 20px 0; line-height: 28px;">Dear Customer,</h4>
                <h4 style="color: #404040; font-size: 18px; margin: 0; line-height: 28px;padding-bottom: 40px;border-bottom: 2px dashed #ebebeb;">
                    ALERT! <b>{{ $recall->brand_name }}</b> has recalled its product <b>{{ $recall->product }}
                    ({{ $recall->product_type }}) due to {{ $recall->recall_reason }}</b>
                    laudantium, totam rem aperiam.</h4>
            </td>
        </tr>
        @if(!empty($order))
            <tr>
                <td style="padding:40px 0px 40px 0px;width:100%;border-bottom:2px dashed #ebebeb" colspan="2">
                    <img style="margin-right: 30px"
                         src='{{ asset("assets/img/email-check.png") }}' alt="" width="40px">
                    <div style="display:inline-block">
                        <h3 style="color: #000; font-size: 18px; margin:0 0 5px;">BATCH NUMBER</h3>
                        <h6 style="color: #000; font-size: 20px; margin: 0;">{{ $order->batch_id }}</h6>
                    </div>
                </td>
            </tr>
        @endif
        <tr>
            <td style="padding:40px 0px 40px 0px;width:100%;border-bottom:2px dashed #ebebeb" colspan="2">
                <h3 style="color: #000; font-size: 18px; margin: 0 0 15px 0;">PROBLEM</h3>
                <p style="color: #404040; font-size: 18px; line-height: 28px; margin-bottom: 40px;">{{ $recall->recall_reason }}</p>
                <h3 style="color: #000; font-size: 18px; margin: 0 0 15px 0;">WARNING MESSAGE</h3>
                <p style="color: #404040; font-size: 18px; line-height: 28px; margin-bottom: 0;">
                    Please discard the product immediately.
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding:40px 0px 40px 0px;width:100%">
                <h3 style="color: #404040; font-size: 18px; margin: 0 0 15px 0; font-weight: 600">CONTACT: <span
                            style="font-weight: 400">{{ $store->contact }}</span></h3>
            </td>
            <td style="padding:40px 0px 40px 0px;width:100%;text-align:right">
                <h3 style="color: #404040; font-size: 18px; margin: 0 0 15px 0; font-weight: 600; display:flex;">EMAIL:
                    <a href="#" style="font-weight: 400">{{ $store->email }}</a></h3>
            </td>
        </tr>
    </table>
</div>
@include("emails.footer")
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Billing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<div class="container">
    <div class="bill-box" style="border: 1px solid black; padding: 50px 30px">
        <div class="row">
            <div class="col">GST No.06555525855</div>
            <div class="col text-center">||JAI SHIYA RAM ||</div>
            <div class="col text-right">PHONE NO:9802020870</div>

        </div>
        <div class="row">
            <div class="col">GST No.06555525855</div>
            <div class="col text-center">GST INVOICE</div>
            <div class="col text-right">:9802020870</div>
        </div>
        <div class="row">
            <div class="col">GST No.06555525855</div>
            <div class="col text-center"></div>
            <div class="col text-right"></div>
        </div>
        <div class="row">
            <div class="col text-center"><h3>HARYANA HOMOEOPATHIC STORE</h3></div>
        </div>

        <div class="row">
            <div class="col">INV.NO:{{$bill->id}}</div>
            <div class="col-6 text-center">NEAR PNB BANK,DABRA CHOWK,DELHI ROAD,HISAR</div>
            <div class="col text-right">Date:{{$bill->bill_date}}</div>
            <hr>
        </div>

        <div class="row">
            <div class="col">CUSTOMER:{{$bill->customer->name}}</div>
            <div class="col">DL.NO.{{$bill->customer->dl_no}}</div>

        </div>
        <div class="row">
            <div class="col">:.....</div>
            <div class="col">GST NO:{{$bill->customer->gst_no}}</div>

        </div>
        <table class="table">
            <thead>
            <tr>
                <th>MFG</th>
                <th>QTY</th>
                <th colspan="2">PRODUCT NAME & PACKING</th>

                <th>HSN CODE</th>
                <th>BATCH NO</th>
                <th>E.DT</th>
                <th>M.R.P</th>
                <th>RATE</th>
                <th>DIS.%</th>
                <th>TAX TYPE</th>
                <th>AMOUNT</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bill->BillItems as $item)
                <tr>
                    <td scope="row">{{$item->stocks->items->mfg_code}}</td>
                    <td>{{$item->stocks->quantity}}</td>
                    <td>{{$item->stocks->items->product_name}}</td>
                    <td>{{$item->stocks->items->packing}}</td>
                    <td>{{$item->stocks->items->hsn_code}}</td>
                    <td>{{$item->stocks->batch_no}}</td>
                    <td>{{$item->stocks->exp_date}}</td>
                    <td>{{$item->stocks->mrp}}</td>
                    <td>{{$item->rate}}</td>
                    <td>{{$item->discount}}</td>
                    <td>GST{{$item->stocks->items->gst}}%</td>
                    <td>{{$item->amount}}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="10">Do Not Pay Without Authorised Printed Receipt</td>
                <td>Total</td>
                <td>{{$bill->total_amount}}</td>
            </tr>
            <tr>
                <td colspan="10"></td>
                <td>S.G.S.T</td>
                <td>{{$bill->sgst_amount}}</td>
            </tr>
            <tr>
                <td colspan="10"></td>
                <td>C.G.S.T</td>
                <td>{{$bill->cgst_amount}}</td>
            </tr>
            <tr>
                <td colspan="6">ALL DISPUTES SUBJECT TO HISAR JURISDICTION</td>
                <td colspan="5" class="text-right">INVOICE VALUE NET</td>
                <td>{{$bill->net_amount}}</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col">GST 12% 113.50 GST 18% 823.75 GST 28% 367.50 GST 5% 842.0</div>
        </div>
        <div class="row">
            <div class="col">E. & O.E.()</div>
        </div>

    </div>
</div>
</body>
</html>
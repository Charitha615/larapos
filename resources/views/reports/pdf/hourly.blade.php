<html lang="en">
<head>
    <style>
        @page {
            /*margin: 0px;*/
        }

        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul,
        li {
            /*margin: 0px;*/
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .view-100 {
            width: 100%;
            vertical-align: middle;
        }

        .view-100::after {
            content: "";
            clear: both;
            display: table;
        }

        /*
        new sec
        */
        .pdf-body {
            padding: 20px 20px 20px 20px;
        }

        .secs {
            display: inline-block;
            vertical-align: top;
        }

        .block-top {
            display: inline-block;
            vertical-align: top;
        }

        .sec-1 {
            width: 20%;
        }

        .sec-2 {
            width: 55%;
            text-align: center;
            vertical-align: bottom;
        }

        .sec-3 {
            width: 20%;
            height: 100px;
        }

        .sec-3 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .base-font {
            font-size: 8px;
            line-height: 10px;
            word-break: break-all;
            line-break: anywhere;
            font-weight: normal;
            letter-spacing: .035rem;
        }

        .header-font {
            font-size: 10px;
            line-height: 12px;
            word-break: break-all;
            line-break: anywhere;
            font-weight: bold;
            letter-spacing: .035rem;
        }

        .table-body {
            font-size: 10px;
            line-height: 12px;
            word-break: break-all;
            line-break: anywhere;
            font-weight: normal;
            letter-spacing: .035rem;
        }

        .table-content {
            margin-top: 15px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body style="position: relative;min-height: 100%;">
<div class="top-sec view-100">
    <div class="secs sec-1">
        <p class="base-font block-top">Printed Date</p>
        <span class="base-font block-top" style="margin-top:8px">{{\Carbon\Carbon::now()}}</span>
    </div>
    <div class="secs sec-2">
        <h2 class="header-font">Club Liverpool</h2>
        <p class="header-font" style="margin: 10px 0;">Monthly Summary Department Total</p>
        <div class="secs">
            <p class="base-font block-top ">Date Range <span class="base-font"> {{\Carbon\Carbon::parse($data->from_date??\Carbon\Carbon::now())->format('d/m/Y')}}</span></p>
            <p class="base-font block-top">Date Range <span class="base-font">{{\Carbon\Carbon::parse($data->to_date??\Carbon\Carbon::now())->format('d/m/Y')}}</span></p>
        </div>
    </div>
    <div class="secs sec-3">
        <img width="40" src="{{ asset('/images/pdf.jpg') }}"
             alt="" />
    </div>
</div>
@php
    $sum = 0;
    $gst_sum = 0;
@endphp
<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; ">
    <tr>
        <td width="25%"><u>Hour</u></td>
        <td width="25%"><u>Items</u></td>
        <td width="25%" ><u>Value</u></td>
        <td width="25%" ><u>Customer</u></td>
    </tr>
</table>
</body>
</html>

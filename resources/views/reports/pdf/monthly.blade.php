<!DOCTYPE html>
<html>

<head>
    <title>My CV</title>
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

<body>
<div class="pdf-body">

    <div class="top-sec view-100">
        <div class="secs sec-1">
            <p class="base-font block-top">Printed Date</p>
            <span class="base-font block-top">10.10.2022 14:55:47</span>
        </div>
        <div class="secs sec-2">
            <h2 class="header-font">Club Liverpool</h2>
            <p class="header-font" style="margin: 10px 0;">Monthly Summary Department Total</p>
            <div class="secs">
                <p class="base-font block-top ">Date Range <span class="base-font">09/09/2022</span></p>
                <p class="base-font block-top">Date Range <span class="base-font">09/09/2022</span></p>
            </div>
        </div>
        <div class="secs sec-3">
            <img width="40" src="{{ asset('/images/pdf.jpg') }}"
                 alt="" />
        </div>
    </div>

    <table class="table-content">
        <tr class="font-12">
            <th class="header-font" style="width: 100px;height :20px;text-align:left;">Department
            </th>
            <th class="header-font" style="width: 100px;height :20px;text-align:left;">Year</th>
            <th class="header-font" style="width: 43px;height :20px;">Jan</th>
            <th class="header-font" style="width: 43px;height :20px;">Feb</th>
            <th class="header-font" style="width: 43px;height :20px;">Mar</th>
            <th class="header-font" style="width: 43px;height :20px;">Apr</th>
            <th class="header-font" style="width: 43px;height :20px;">May</th>
            <th class="header-font" style="width: 43px;height :20px;">Jun</th>
            <th class="header-font" style="width: 43px;height :20px;">Jul</th>
            <th class="header-font" style="width: 43px;height :20px;">Aug</th>
            <th class="header-font" style="width: 43px;height :20px;">Sep</th>
            <th class="header-font" style="width: 43px;height :20px;">Oct</th>
            <th class="header-font" style="width: 43px;height :20px;">Nov</th>
            <th class="header-font" style="width: 43px;height :20px;">Dec</th>
        </tr>
        <tr>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;">Beverages</td>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;border-top:1px solid;">2022
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
        </tr>
        <tr>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;">Beverages Beverages Beverages
            </td>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;border-top:1px solid;">2022
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;border-top:1px solid;">0.00
            </td>
        </tr>
        <tr style="padding:20px 0px !important; ">
            <td class="header-font" style="width: 100px;height :20px;text-align:left;">Total</td>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;"> </td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
            <td class="table-body" style="width: 43px;height :20px;text-align:center;">0.00</td>
        </tr>
        <tr style="padding:20px 0px !important; ">
            <td class="header-font" style="width: 100px;height :20px;text-align:left;">Grand Total</td>
            <td class="header-font" style="width: 100px;height :20px;text-align:left;">$ 58,186.60 </td>
        </tr>
    </table>
</div>
</body>

</html>

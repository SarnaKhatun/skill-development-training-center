<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @importurl('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap');
        * {
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Roboto Slab', serif;
        }
        .page {
            background-color: white;
            display: block;
            padding: 0;
            margin: 0;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .page[size="A4"] {
            width: 21cm;
            position: relative;
            padding: 0;
            margin: 0;
        }

        .margin-top-50 {
            margin-top: 50px;
        }

        ul {
            padding: 0;
            margin: 0;
        }

        li {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .customer__info ul li {
            float: left;
            margin-bottom: 5px;
            padding: 0;
            margin: 0;
            width: 50%;
        }

        .customer__info ul li h4 {
            font-size: 18px;
            font-weight: 500;
        }

        .customer__info ul li h4 span {
            font-weight: normal;
            font-size: 18px;
        }

        .customer__info {
            padding: 35px 45px;
        }

        .invoice__body {
            padding-top: 50px;
            padding: 0;
            margin: 0;
        }

        .invoice__body h3 {
            background: #00A450;
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            padding: 8px 0;
            font-size: 20px;
        }

        .invoice__body span {
            font-size: 14px;
        }

        .table__space {
            padding: 40px;
            padding: 0;
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 0;
            margin: 0;
            border-collapse: collapse;
        }

        .signature {
            padding-right: 40px;
            position: absolute;
            right: 0;
            bottom: 130px;
        }

        .signature h2 {
            border-top: 1px solid #000;
            font-weight: 700;
        }

        <blade media|%20print%20%7B>.graph-img img {
            display: inline;
        }

        .information h2 {
            font-size: 25px;
        }

        .information h6 {
            font-size: 14px;
        }


        .header__bar {
            padding-left: 35px;
            margin-bottom: 30px;
        }

        .table__space h5 {
            font-size: 20px;
            text-transform: capitalize;
            border: 1px solid #000;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            position: absolute;
            right: 40px;
            top: -10px;
        }

        .table__space {
            position: relative;
            padding: 0;
            margin: 0;
        }

        .logo img {
            width: 100px;
        }

    </style>
</head>

<body>
    <div class="my-page page" size="A4">
        <div class="invoice__body margin-top-50">
            <div class="header__bar" style="margin-bottom:70px;">
                <div class="logo" style="float:left;">
                    <img src="{{ public_path('frontend/img/logo.png') }}" alt="">
                </div>
                <div class="information"
                    style="margin-top:20px;margin-left:50px">
                    <h4 style="margin:0;font-size:18px">{{ $branch->institute_name_en }}
                        ({{ $branch->center_code }})</h4>
                    <h6 style="margin:0;font-size:15px">
                        {{ $branch->institute_emain ?? '' }}</h6>
                    <h6 style="margin:0;font-size:15px">
                        {{ $branch->institute_address ?? '' }}</h6>
                    <h6 style="margin:0;font-size:15px">Website : sdtl.com.bd</h6>
                </div>
            </div>

            <div class="table__space">
                <table>
                    <tr>
                        <th style="width:15px">No.</th>
                        <th style="width:80px">Roll</th>
                        <th style="width:150px">Personal Informations</th>
                        <th style="width:200px">Course Informations</th>
                        <th style="width:80px">Paid</th>
                        <th style="width:80px">Due</th>
                        <th style="width:80px">Image</th>
                    </tr>
                    @foreach($students as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                Roll-{{ $item->student_roll }} <br>
                                Reg-{{ $item->student_registration_no ?? '' }}
                            </td>
                            <td>
                                <h6 style="font-weight:700;margin:0">{{ $item->name_en }}</h6>
                                {{ $item->fathers_name }}<br>
                                {{ $item->mothers_name }}<br>
                                {{ $item->phone }}
                            </td>
                            <td>{{ $item->course->name }}<br>
                               <!-- {{ $item->session->name }} <br>-->
                                {{ \Carbon\Carbon::parse($item->session_start)->format('j F Y') }}
                                -
                                {{ \Carbon\Carbon::parse($item->session_end)->format('j F Y') }}<br>
                               Batch- {{ $item->batch->name }} <br>
                                {{ $item->present_address ?? '' }}
                            </td>
                            <td> {{ $item->paid ?? '0.00' }}</td>
                            <td> {{ $item->due ?? '0.00' }}</td>
                            <td style="margin:0;padding:0">
                                @if($item->image)
                                    <img src="{{ public_path($item->image) }}" width="60" class="custom-img-style"
                                        alt="No Image">
                                @else
                                    <img src="{{ public_path('backend/images/no-image.png') }}"
                                        class="custom-img-style" width="60" alt="No Image">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
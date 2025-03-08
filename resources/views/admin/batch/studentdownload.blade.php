<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Roboto Slab', serif;
        }

        .page {
            background-color: white;
            display: block;
            margin: 0 auto;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
            position: relative;
        }

        ul {
            padding: 0;
            margin: 0;
        }

        li {
            list-style: none;
        }

        .customer__info ul li {
            float: left;
            margin-bottom: 5px;
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
            padding-top: 100px;
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
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
            padding: 5px;
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

        @media print {
            .graph-img img {
                display: inline;
            }

            * {
                -webkit-print-color-adjust: exact;
            }
        }

        .logo img {
            width: 100px;
        }

        .information h2 {
            font-size: 25px;
        }

        .information h6 {
            font-size: 14px;
        }

        .logo {
            width: 20%;
            float: left;
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
        }
        .my-page{
            background-image: url('{{ public_path('backend/pdf/pad-bg.png') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
</head>

<body>
    <div class="my-page page" size="A4"
        style="">

        <div class="invoice__body">

            <div class="header__bar">
                <div class="logo">
                    <img src="{{ public_path('frontend/img/logo.png') }}" alt="">
                </div>
                <div class="information">
                     <h4>{{$branch->institute_name_en }} ({{$branch->center_code }})</h4>
                    <h6>{{$branch->institute_emain ?? '' }}</h6>
                    <h6>{{$branch->institute_address ?? ''}}</h6>
                    <h6>website:sdlt.com.bd</h6>
                </div>
            </div>

            <div class="table__space">
                <h5>Batch : {{ $batch->name }} </h5>
                {{-- <table style="width:100%">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Course Name</th>
                        <th>Session</th>
                    </tr>
                    @foreach ($students as $key=>$item)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <th>{{ $item->name_en }}</th>
                        <th>{{ $item->phone }}</th>
                        <th>{{ $item->course->name }}</th>
                        <th>{{ $item->session->name}}</th>
                    </tr>
                    @endforeach
                </table> --}}
                <table style="width:100%">
                    <tr>
                        <th>No.</th>
                        <th>Roll/Reg</th>
                        <th>Personal Informations</th>
                        <th>Course Informations</th>
                        <th>Result</th>
                        <th>Image</th>
                    </tr>
                    @foreach ($students as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                Roll-{{ $item->student_roll }} <br>
                                Reg-{{ $item->student_registration_no }}
                            </td>
                            <td>
                                <h6 style="font-weight:700 ">{{ $item->name_en }}</h6>
                                {{ $item->fathers_name }}<br>
                                {{ $item->mothers_name }}<br>
                                {{ $item->phone }}
                            </td>
                            <td>{{ $item->course->name }}<br>
                                {{ $item->session->name }} <br>
                                {{ \Carbon\Carbon::parse($item->session_start)->format('j F Y') }}
                                - {{ \Carbon\Carbon::parse($item->session_end)->format('j F Y') }}<br>
                                {{ $item->batch->name }}
                            </td>
                            <td> {{ $item->result->cgpa ?? 0 }}</td>
                            <td>
                                @if ($item->image)
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
{{-- <script>
    window.onload = function() {
        window.print();
    };
</script> --}}
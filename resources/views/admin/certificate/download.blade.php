<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://db.onlinewebfonts.com/c/fb91ae4fe9b0e928f37fbfbb73da4e2a?family=CommercialScriptNo2"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }

            .print-m-0 {
                margin: 0 !important;
            }

            p.role_number {
                position: absolute;
                top: 100px !important;
            }


        }


        .cert-container {
            margin: -6px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .cert-bg {
            position: absolute;
            left: -1px;
            top: 0;
            z-index: -1;
            width: 100%;
        }

        .cert {
            width: 1070px;
            height: 770px;
            text-align: center;
            margin: auto;
            position: relative;
            z-index: -1;
        }


        .student_identify p:nth-child(1) {
            position: absolute;
            top: 193px;
            right: 45px;
            font-size: 20px
        }

        .student_identify p:nth-child(2) {
            position: absolute;
            top: 225px;
            right: 40px;
            font-size: 19px
        }

        .student_identify p:nth-child(3) {
            position: absolute;
            top: 260px;
            right: 40px;
            font-size: 19px
        }

        .student_identify p:nth-child(4) {
            position: absolute;
            top: 240px;
            left: 305px;
        }

        .student_identify p:nth-child(5) {
            position: absolute;
            top: 285px;
            left: 555px;
        }

        .student_identify p:nth-child(6) {
            position: absolute;
            top: 330px;
            left: 455px;
        }

        .student_identify p:nth-child(7) {
            position: absolute;
            top: 380px;
            left: 500px;
        }

        .student_identify p:nth-child(8) {
            position: absolute;
            top: 440px;
            left: 590px;
            font-size: 22px
        }

        .student_identify p:nth-child(9) {
            position: absolute;
            top: 500px;
            font-size: 19px;
            left: 415px;
        }

        .student_identify p:nth-child(10) {
            position: absolute;
            top: 490px;
            right: 60px;
            font-size: 25px
        }

        .student_identify p:nth-child(11) {
            position: absolute;
            top: 530px;
            left: 385px
        }

        .student_identify p:nth-child(12) {
            position: absolute;
            top: 530px;
            left: 575px;
        }

        .student_identify p:nth-child(13) {
            position: absolute;
            top: 530px;
            right: 80px
        }


        @font-face {
            font-family: 'Commercial Script No2';
            src: url('CommercialScriptNo2.woff2') format('woff2'),
                url('CommercialScriptNo2.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        .student_identify p {
            font-family: 'CommercialScriptNo2', cursive;
            font-size: 28px;
            /* text-shadow: 2px 2px 0 #000; */
            text-shadow: 0.5px 0 black, 0 0.5px black, 0.5px 0.5px black;

        }

        li {
            list-style: none
        }
    </style>

</head>

@foreach ($students as $student)

    <body>
        <div class="cert-container print-m-0">
            <div id="content2" class="cert">
                <!-- Replace the image source with a proper path -->
                <img src="{{ public_path('backend/certificate/certificate-final.jpg') }}" class="cert-bg"
                    alt="" />
                {{--  <img src="{{ asset('backend/certificate/certificate-final.jpg') }}" class="cert-bg" style="width: 100%"  alt="">   --}}
                <div>
                    @if ($student->course && $student->course->courseSubject)
                        @php
                            $count = $student->course->courseSubject->count();
                        @endphp

                        @if ($count <= 1)
                            <div style="position: absolute;bottom:200px;left:42px">
                                <h2
                                    style="text-align: center;border-bottom:1px solid #000;display:inline-block;margin-bottom:10px">
                                    Subject</h2>
                                <ul class="subject_list">
                                    @php
                                        $data = $student->course->courseSubject->first();
                                    @endphp
                                    @if ($data)
                                        @foreach (json_decode($data->item) ?? [] as $value)
                                            <li style="font-size: 17px;text-align:left;margin-bottom:3px;">
                                                {{ $value }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @else
                            <div class="allsubject" style="position: absolute;top:400px;left:65px">
                                <h2
                                    style="text-align: center;border-bottom:1px solid #000;display:inline-block;margin-bottom:10px">
                                    Subject</h2>
                                <ul>
                                    @foreach ($student->course->courseSubject as $subject)
                                        <li>
                                            <strong
                                                style="text-align: left;
                                position: relative;
                                width: 100%;
                                display: inline-block;
                                left: -12px;
                                font-size: 13px;">{{ $subject->title }}</strong>
                                            <ul>
                                                @foreach (json_decode($subject->item) ?? [] as $value)
                                                    <li style="font-size: 11px; text-align: left;">{{ $value }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                    <?php
                    if ($student->gender == 'Male') {
                        $child = 'Son of';
                    } else {
                        $child = 'Doughter of';
                    }
                    $name = $student->name_en;
                    $fathers_name = $student->fathers_name;
                    $mothers_name = $student->mothers_name;
                    $student_roll = $student->student_roll;
                    $url = route('student_info', $student->student_roll);
                    $and = 'and';
                    $rol = '. Roll :';
                    $data = "$name  $child  $fathers_name  $and  $mothers_name  $rol  $student_roll    $url";
                    ?>
                    <div id="qr_code" style="position: absolute; top:634px;left:85px">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= urlencode($data) ?>&size=120x120"
                            alt="QR Code" style="max-width: 150px;">
                    </div>
                </div>
                <div class="cert-content">
                    <div class="student_identify">
                        <p class="role_number">{{ $student->student_roll }}</p>
                        <p class="reg_number">{{ $student->student_registration_no }}</p>
                        <p class="issue_date">{{ $issue_date }}</p>
                        <p class="sl_no">{{ $student->result->id ?? '' }}</p>
                        <p class="name">{{ $student->name_en }}</p>
                        <p class="father_name">{{ $student->fathers_name }}</p>
                        <p class="mother_name">{{ $student->mothers_name }}</p>
                        <p class="department">{{ $student->course->name }}</p>
                        <p class="branch">{{ $student->branch->institute_name_en }}</p>
                        <p class="branch_code">{{ $student->branch->center_code }}</p>
                        <p class="month_from">{{ \Carbon\Carbon::parse($student->session_start)->format('F y') }}</p>
                        <p class="month_to">{{ \Carbon\Carbon::parse($student->session_end)->format(' F y') }}</p>
                        <p class="grade">{{ $student->result->cgpa ?? '' }}</p>
                    </div>
                </div>
                
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

        {{-- <script>
        $("#downloadPDF").click(function() {
                getScreenshotOfElement(
                    $("div#content2").get(0),
                    0,
                    0,
                    $("#content2").width() +
                    45,
                    $("#content2").height() +
                    30,
                    function(data) {
                        var pdf = new jsPDF("l", "pt", [
                            $("#content2").width(),
                            $("#content2").height(),
                        ]);

                        pdf.addImage(
                            "data:image/png;base64," + data,
                            "PNG",
                            0,
                            0,
                            $("#content2").width(),
                            $("#content2").height()
                        );
                        pdf.save("azimuth-certificte.pdf");
                    }
                );
            });

            function getScreenshotOfElement(element, posX, posY, width, height, callback) {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        var context = canvas.getContext("2d");
                        var imageData = context.getImageData(posX, posY, width, height).data;
                        var outputCanvas = document.createElement("canvas");
                        var outputContext = outputCanvas.getContext("2d");
                        outputCanvas.width = width;
                        outputCanvas.height = height;

                        var idata = outputContext.createImageData(width, height);
                        idata.data.set(imageData);
                        outputContext.putImageData(idata, 0, 0);
                        callback(outputCanvas.toDataURL().replace("data:image/png;base64,", ""));
                    },
                    width: width,
                    height: height,
                    useCORS: true,
                    taintTest: false,
                    allowTaint: false,
                });
            }
    </script> --}}

    </body>
@endforeach

</html>
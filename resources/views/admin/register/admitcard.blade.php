<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
        .cert-container {
            position: relative;
        }

        p {
            margin: 0
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            font-weight: normal;
        }

        .header_title {
            position: absolute;
            top: 60px;
            left: 160px
        }

        img.cert-bg {
            padding-left: 35px;
        }

        .student_info th,
        .student_info td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px
        }

        .student_info td {
            width: 150px
        }

        .student_info th {
            text-align: left;
            width: 93.5px
        }
        .instruction ul li{
            color: #FF0000;
            list-style: none;
            text-align: justify;
            margin-bottom: 10px
        }
        .instruction ul li span {
            width: 15px;
            display: inline-block;
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="cert-container print-m-0">
        <div id="content2" class="cert">
            <!-- Replace the image source with a proper path -->
            <img src="{{ public_path('backend/certificate/admid.jpg') }}" style="width: 100%" alt="" />

            <div class="header_title" style="position: absolute;top:70px">
                <span style="color: #FF0000;font-size:18px">Approved by Govt. of The People’s Republic
                    of Bangladesh</span> <br>
                <span style="color: #32CC00;font-size:32px">Skills Development Training Center</span> <br>
                <span>Insure Proper Use of Technology, Build Self-Reliant Bangladesh.....</span>
            </div>

            <div class="header_bottom" style="position: absolute;top:170px;left:70px">
                <table style="width: 100%">
                    <tr>
                        <td style="width:100px"><strong>SL No. </strong>{{$register->id}}</td>
                        <td style="text-align: center" width:500px>
                            <span style="color:#000080">A Project of Skills Development Training Ltd.</span> <br>
                            <span style="color: #FF0000">Govt. Reg. No. C- 192419/2023</span> <br>
                            <span><a href="{{ route('home') }}" style="text-decoration: none">sdtl.com.bd</a></span> </br></br>
                            <button
                                style="background: #B4AE14;color:white;border-radius:10px;padding:5px 20px;font-weight:700">Admit
                                Card</button>
                        </td>
                        <td>
                            <img src="{{ public_path($register->student->image) }}"
                                style="width: 108px;height:137px;" class="cert-bg " alt="" />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="student_info" style="position: absolute;top:320px;left:70px;">
                <table style="border: 1px solid black;
                border-collapse: collapse;">
                    <tr>
                        <td>Name of Examinee</td>
                        <th colspan="3">{{ $register->student->name_en }}</th>
                    </tr>
                    <tr>
                        <td>Father's Name </td>
                        <th colspan="3">{{ $register->student->fathers_name }}</th>
                    </tr>
                    <tr>
                        <td>Mother's Name </td>
                        <th colspan="3">{{ $register->student->mothers_name }}</th>
                    </tr>
                    <tr>
                        <td>Centre Code</td>
                        <th colspan="3">{{ $register->student->branch->center_code }}</th>
                    </tr>
                    <tr>
                        <td>Centre Name</td>
                        <th colspan="3">{{ $register->student->branch->institute_name_en }}</th>
                    </tr>
                    <tr>
                        <td>Course Name </td>
                        <th colspan="3">{{ $register->student->course->name }}</th>
                    </tr>
                    <tr>
                        <td>Session</td>
                        <th colspan="3">{{ \Carbon\Carbon::parse($register->student->session_start)->format('j F ') }}  -  {{ \Carbon\Carbon::parse($register->student->session_end)->format('j F ') }}</th>
                    </tr>
                    <tr>
                        <td>Roll No</td>
                        <th>{{ $register->student->student_roll }}</th>
                        <td>Registration No</td>
                        <th>{{ $register->student->student_registration_no }}</th>
                    </tr>
                </table>
            </div>

            <div class="subject" style="position: absolute;left:70px;top:620px;">
                <h6 style="font-size: 20px"><strong>Subject: </strong> </h6>
            </div>

            <div style="position: absolute;left:70px;top:650px">
                <table style="width: 100%">
                    <tr></tr>
                    <tr>
                        <td><strong>Date : </strong>{{ \Carbon\Carbon::parse($register->exam_date)->format('j F, Y ') }}</td>
                        <td style="padding-left:300px">
                            <strong style="border-top: 1px solid #000;padding-top:3px">Regional Director</strong>
                            <h6 style="text-align: center">Skills Development Training Ltd.</h6>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="instruction" style="position: absolute;left:30px;top:700px;right:80px">
                <ul>
                    <li><span>1.</span> If any kind of error is observed in the admission form, it should be corrected by the
                        concerned branch
                        before the commencement of the examination. No one can participate in the examination by wrong
                        or
                        incomplete admission.</li>
                    <li><span>2.</span> Must participate in the examination according to the day, date and schedule fixed by the
                        authority.</li>
                    <li><span>3.</span> Original admission card and registration card must be brought along.</li>
                    <li><span>4.</span> Mobile entry is prohibited in the examination hall.</li>
                </ul>
            </div>


        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <script>
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
    </script>

</body>
</html>
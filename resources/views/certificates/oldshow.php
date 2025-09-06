<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Clearance Certificate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
        }

        .certificate-container {
            width: 800px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            border: 2px solid #2c3e50;
        }

        .header {
            background: linear-gradient(to right, #0f3b70, #0f3b70);
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid black;
            position: relative;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .header::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z" fill="%23d4af37"/></svg>') no-repeat center center;
            background-size: contain;
        }

        .content {
            padding: 40px;
        }

        .certificate-body {
            border: 3px double #2c3e50;
            padding: 30px;
            position: relative;
        }

        .official-seal {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 120px;
            height: 120px;
            border: 2px solid #d4af37;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle, #fff 60%, #f5f5f5 90%);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .seal-inner {
            text-align: center;
            font-size: 12px;
            color: #2c3e50;
            font-weight: bold;
        }

        .seal-inner::before {
            content: "OFFICIAL SEAL";
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            text-decoration: underline;
        }

        .qr-code {
            position: absolute;
            top: 150px;
            right: 25px;
            width: 110px;
            height: 110px;
            background: #fff;
            border: 1px solid #d4af37;
            padding: 5px;
            z-index: 1;
        }

        .qr-code::after {
            content: "Scan to Verify";
            position: absolute;
            bottom: -20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #2c3e50;
            font-weight: bold;
        }

        .photo-section {
            display: flex;
            margin-bottom: 30px;
        }

        .photo-placeholder {
            width: 150px;
            height: 180px;
            background: linear-gradient(45deg, #e6e6e6, #f9f9f9);
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 20px;
            position: relative;
        }

        .photo-placeholder::after {
            content: "PASSPORT PHOTO";
            position: absolute;
            bottom: 5px;
            font-size: 10px;
            color: #777;
        }

        .photo-stamp {
            position: absolute;
            bottom: 40%;
            right: 10px;
            color: #000;
            font-size: 20px;
            font-weight: bold;
            transform: rotate(-15deg);
            opacity: 1;
        }
.signature-block {
    text-align: center;
    margin-top: 20px;
}

.signature-block .signature-image {
    width: 200px;  /* Adjust width as needed */
    height: auto;
    margin-bottom: -70px;
}

.signature-block h1 {
    font-size: 20px;
    font-weight: bold;
    margin: 0;
}

.signature-block h2 {
    font-size: 16px;
    font-weight: normal;
    margin: 0;
}
        .personal-info {
            flex: 1;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
            border-bottom: 1px dotted #eee;
            padding-bottom: 5px;
        }

        .info-label {
            width: 180px;
            font-weight: bold;
            color: #2c3e50;
        }

        .info-value {
            flex: 1;
            color: #333;
        }

        .result-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: linear-gradient(to right, #f9f9f9, #fff, #f9f9f9);
            border-top: 2px solid #2c3e50;
            border-bottom: 2px solid #2c3e50;
        }

        .result-text {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .clear-status {
            font-size: 16px;
            color: #2e8b57;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .validity {
            text-align: center;
            margin: 20px 0;
            font-style: italic;
            color: #666;
        }

        .signature-area {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature {
            text-align: center;
            width: 250px;
        }

        .sign-line {
            width: 200px;
            border-top: 1px solid #000;
            margin: 5px auto;
            padding-top: 25px;
        }

        .footer {
            background: linear-gradient(to right, #0f3b70, #0f3b70);
            color: white;
            padding: 15px 70px;
            text-align: center;
            border-top: 5px solid #000;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .footer-content {
            flex: 1;
            text-align: center;
            padding: 0 20px;
        }

        .footer-logo {
            margin-top: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #d4af37;
        }

        .footer-logo-left, .footer-logo-right {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #fff, #fff);
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .footer-logo-left::before, .footer-logo-right::before {
            content: "CID";
            font-weight: bold;
            color: #2c3e50;
            font-size: 16px;
        }

        .watermark {
            position: absolute;
            opacity: 0.03;
            font-size: 180px;
            font-weight: bold;
            color: #000;
            transform: rotate(-45deg);
            top: 30%;
            left: 10%;
            z-index: -1;
            white-space: nowrap;
        }

        .ribbon {
            position: absolute;
            top: -10px;
            left: -10px;
            background: #d4af37;
            color: #2c3e50;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: bold;
            transform: rotate(-45deg);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        

        
  
    
    </style>
</head>
<body>
<div class="certificate-container">
    <div class="header">
        <h1>TALISKA CIIDANKA BOOLISKA SOOMAALIYED</h1>
        <h4>QAYBTA BAARISTA DANBIYADA BOLIISKA GALMUDUG C.I.D</h4>
    </div>

    <div class="content">
        <div class="certificate-body">
            <div class="official-seal">
                <div class="seal-inner">
                    NATIONAL POLICE<br>
                    EXAMPLELAND<br>
                    2023
                </div>
            </div>

            <div class="qr-code">
                @if($certificate->qr_code_path)
                    <img src="{{ asset('upload/QR_code_for_mobile_English_Wikipedia.svg.png') }}" style="width:100%;height:100%;">
                @endif
            </div>

            <div class="photo-section">
                <div class="photo-placeholder">
                    @if($certificate->application->applicant->photo_path)
                        <img src="{{ asset('/'.$certificate->application->applicant->photo_path) }}" style="width:100%;height:100%;">
                    @else
                        Photograph
                    @endif
                    <div class="photo-stamp">Galmudug State Police</div>
                </div>

                <div class="personal-info">
                    <div class="info-row">
                        <div class="info-label">Certificate Number:</div>
                        <div class="info-value">{{ $certificate->certificate_number }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Full Name:</div>
                        <div class="info-value">{{ $certificate->application->applicant->first_name ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Date of Birth:</div>
                        <div class="info-value">{{ $certificate->application->applicant->dob ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">gender:</div>
                        <div class="info-value">{{ $certificate->application->applicant->gender ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Nationality:</div>
                        <div class="info-value">{{ $certificate->application->applicant->nationality ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Passport No.:</div>
                        <div class="info-value">{{ $certificate->application->applicant->passport_no ?? '-' }}</div>
                    </div>
                      <div class="info-row">
                        <div class="info-label">national  No.:</div>
                        <div class="info-value">{{ $certificate->application->applicant->national_id ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Purpose of Issue:</div>
                        <div class="info-value">{{ $certificate->application->application_type ?? '-' }}</div>
                    </div>
                </div>
            </div>

            <div class="result-section">
                <div class="result-text">CRIMINAL RECORD CHECK RESULT</div>
                 <div class="clear-status">{{ $certificate->status == 'active' ? 'Waxaa halkaan lagu cadeeyay in qofka kor ku xusan lagu baaray Xafiiska Diiwaanka Dembiyada C.I.D
lagana waayay wax dambi hore ah:
' : 'Record Found' }}</div>
<br>
                <div class="clear-status">{{ $certificate->status == 'active' ? 'It is hereby certified that the above person is investigated in the criminal record keeping office CID Galmudug and not found any previous crime.' : 'Record Found' }}</div>
               

            </div>

            <div class="validity">
                Valid from {{ $certificate->issue_date }} to {{ $certificate->expiry_date }}
            </div>
 <div class="sign-line"></div>
            <!-- <div class="signature-area">
                <div class="signature">
                     <div class="sign-line"></div>
                    <div>Authorized Signatory</div>
                    <div>G/Le: Cilmi Cabdi Cumar </div>
                    <div>Taliyaha Qaybta Baarista Dambiyada Galmudug (C.I. D)</div>
                   
                </div>

                <div class="signature">
                    <div>Date of Issue: {{ $certificate->issue_date }}</div>
                    <div class="sign-line"></div>
                    <div>Director General</div>
                    <div>National Police Agency</div>
                </div>
            </div>  -->
            <div class="signature-block">
    <img src="{{ asset('upload/Screenshot 2025-08-24 205309.png') }}" alt="Seal" class="signature-image">
    <h1>G/Les Cilmii Cabdi Cumar</h1>
    <h2>Taliyaha Qaybta Baarista Dambiyada Galmudug (C.I.D)</h2>
</div>
        </div>
    </div>

    <div class="footer">
            <div class="footer-logo-left"></div>
        <div class="footer-content">
            <p>Tel: 0616378522 | Email: galmudugcid@gmail.com | Dhusamareb, Galmudug</p>
            <div class="footer-logo">Qaybta Baarista Dambiyada Galmudug (C.I.D)</div>
        </div>
        <div class="footer-logo-right"></div>
    </div>
</div>
</body>
</html>

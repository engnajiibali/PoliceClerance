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
        font-size: 17px;
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
    width: 210mm;
    height: 297mm;
    background-color: #fff;
    position: relative; /* needed for overlay */
    border: 2px solid #2c3e50;
    overflow: hidden;
    margin: 0 auto;
}

/* Background watermark */
.certificate-body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('{{ asset("upload/pol.jfif") }}') no-repeat center center;
    background-size: cover;
    opacity: 0.1;          /* only affects the image */
    z-index: 1;
}
/* Keep content above background */

    /* Header Image */
    .header {
            background: linear-gradient(to right, #0f3b70, #0f3b70);
            color: white;
        position: relative;
        width: 100%;
     
        overflow: hidden;
        text-align: center;
        border-bottom:5px solid black;
    }

    .header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .header-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
    }

    .header-text h1 {
        font-size: 16px !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .header-text h4 {
        font-size: 14px !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    /* Content */
    .content {
        padding: 10mm 10mm 10mm 10mm;
    }

    /* Top Titles */
    .top-titles {
        text-align: center;
        margin-bottom: 5mm;
    }

    .top-titles h1, .top-titles h2 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 1mm;
    }

    /* Certificate Body with Background Image */
    .certificate-body {
        border: 3px double #2c3e50;
        padding: 10mm;
        position: relative;
        background: url('{{ asset("upload/pol.png") }}') no-repeat center center;
        background-size: cover;
        min-height: 100%;
    }

    /* QR Code */
    .qr-code {
        position: absolute;
        top: 0;
        right: 0;
        width: 35mm;
        height: 35mm;
        background: #fff;
        border: 1px solid #d4af37;
        padding: 1mm;
        z-index: 2;
    }

    .qr-code::after {
        content: "Scan to Verify";
        position: absolute;
        bottom: -5mm;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 10px;
        color: #2c3e50;
        font-weight: bold;
    }

    /* Photo & Personal Info */
    .photo-section {
        display: flex;
        margin-bottom: 10mm;
        position: relative;
        z-index: 2; /* Ensure it appears above background */
    }

    .photo-placeholder {
        width: 40mm;
        height: 45mm;
        background: linear-gradient(45deg, #e6e6e6, #f9f9f9);
        border: 2px solid #000;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5mm;
        position: relative;
    }

    .photo-placeholder::after {
        content: "PASSPORT PHOTO";
        position: absolute;
        bottom: 1mm;
        font-size: 10px;
        color: #777;
    }

    .photo-stamp {
        position: absolute;
        bottom: 40%;
        right: 1mm;
        color: #000;
        font-size: 12px;
        font-weight: bold;
        transform: rotate(-15deg);
        opacity: 1;
    }

    .personal-info {
        flex: 1;
    }

    .info-row {
        display: flex;
        margin-bottom: 2mm;
        border-bottom: 1px dotted #eee;
        padding-bottom: 1mm;
    }

    .info-label {
        width: 45mm;
        font-weight: bold;
        color: #2c3e50;
    }

    .info-value {
        flex: 1;
        color: #333;
    }

    /* Result Section */
    .result-section {
        text-align: center;
        margin: 5mm 0;
        padding: 5mm;
   
        border-top: 2px solid #2c3e50;
        border-bottom: 2px solid #2c3e50;
        position: relative;
        z-index: 2;
    }

    .result-text {
        font-size: 14px !important;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 2mm;
    }

    .clear-status {
        font-size: 14px !important;
        color: #2e8b57;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .validity {
        text-align: center;
        margin: 3mm 0;
        font-style: italic;
        color: #000;
        position: relative;
        z-index: 2;
    }

    /* Signature Block */
    .signature-block {
        text-align: center;
      
        position: relative;
        z-index: 2;
    }

    .signature-block .signature-image {
        width: 50mm;
        height: auto;
        margin-bottom: -15mm;
    }

    .signature-block h1, .signature-block h2 {
        font-size: 14px !important;
        margin: 0;
    }

    .sign-line {
        width: 50mm;
        border-top: 1px solid #000;
        margin: 2mm auto;
        padding-top: 0;
    }

    /* Footer fixed bottom */
    .footer {
        background: linear-gradient(to right, #0f3b70, #0f3b70);
        color: white;
        padding: 5mm 10mm;
        text-align: center;
        border-top: 5px solid #000;
        font-size: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        bottom: 0;
        width: calc(100%);
        z-index: 2;
    }

    .footer-content {
        flex: 1;
        text-align: center;
        padding: 0 5mm;
    }

    .footer-logo {
        margin-top: 2mm;
        font-weight: bold;
        letter-spacing: 1px;
        color: #d4af37;
        font-size: 14px;
    }

    .footer-logo-left, .footer-logo-right {
        width: 15mm;
        height: 15mm;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(45deg, #fff, #fff);
        border-radius: 50%;
        border: 1px solid white;
        box-shadow: 0 0 2mm rgba(0, 0, 0, 0.3);
    }

    .footer-logo-left::before, .footer-logo-right::before {
        content: "CID";
        font-weight: bold;
        color: #2c3e50;
        font-size: 12px;
    }

    @media print {
        body { background: none; }
        .certificate-container { box-shadow: none; margin: 0; border: 1px solid #000; }
    }
</style>
</head>
<body>

<div class="certificate-container">

    <!-- Header Image -->
    <div class="header">
        <img src="{{ asset('upload/1714911070.1000051226.jpg') }}" alt="header Image">
    </div>

    <!-- Content -->
    <div class="content">

        <!-- Top Titles -->
        <div class="top-titles">
            <h1>SHAHAADADA DAMBI LA`AANTA</h1>
            <h2>NON-CRIMINAL CERTIFICATE</h2>
        </div>

        <div class="certificate-body">

            <!-- QR Code -->
            <div class="qr-code">
                @if($certificate->qr_code_path)
                <img src="{{ asset('upload/QR_code_for_mobile_English_Wikipedia.svg.png') }}" style="width:100%;height:100%;">
                @endif
            </div>

            <!-- Photo and Personal Info -->
            <div class="photo-section">
                <div class="photo-placeholder">
                    @if($certificate->application->applicant->photo_path)
                    <img src="{{ asset('/'.$certificate->application->applicant->photo_path) }}" style="width:100%;height:100%;">
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
                        <div class="info-label">Gender:</div>
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
                        <div class="info-label">National ID:</div>
                        <div class="info-value">{{ $certificate->application->applicant->national_id ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Purpose of Issue:</div>
                        <div class="info-value">{{ $certificate->application->application_type ?? '-' }}</div>
                    </div>
                    
                
                    
                </div>
            </div>

            <!-- Result Section -->
            <div class="result-section">
                <div class="result-text">CRIMINAL RECORD CHECK RESULT</div>
                <div class="clear-status">
                    {{ $certificate->status == 'active' ? 'Waxaa halkaan lagu cadeeyay in qofka kor ku xusan lagu baaray Xafiiska Diiwaanka Dembiyada C.I.D Galmudug lagana waayay wax dambi hore ah:' : 'Record Found' }}
                </div>
                <br>
                <div class="clear-status">
                    {{ $certificate->status == 'active' ? 'It is hereby certified that the above person is investigated in the criminal record keeping office CID Galmudug and not found any previous crime.' : 'Record Found' }}
                </div>
            </div>

            <!-- Validity -->
            <div class="validity">
                Valid from {{ $certificate->issue_date }} to {{ $certificate->expiry_date }}
            </div>

  <!-- Signature Block -->
            <div class="signature-block">
                <img src="{{ asset('upload/Screenshot 2025-08-24 205309.png') }}" alt="Seal" class="signature-image">
                <h1>G/Les Cilmii Cabdi Cumar</h1>
                <h2>Taliyaha Qaybta Baarista Dambiyada Galmudug (C.I.D)</h2>
            </div>
        </div>
    </div>

          
    <!-- Footer -->
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

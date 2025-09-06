<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            margin: 0;
            padding: 0 10px;
            margin-top: 160px; /* Push content below header */
        }

        @page {
            margin: 0 20px 80px 20px;
        }

        h4 {
            margin: 5px 0;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 150px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            background-color: white;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 20%;
            left: 10%;
            width: 80%;
            opacity: 0.1;
            z-index: -1;
            text-align: center;
        }

        .watermark img {
            width: 100%;
            height: auto;
        }

        /* Footer repeated on every page */
        footer {
            position: fixed;
            bottom: -40px;
            left: 0;
            right: 0;
            height: 40px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #000;
        }

        .pagenum:before {
            content: counter(page);
        }

        /* Personal Info */
        .certificate-container {
            position: relative;
            display: flex;
        }

        .form-section {
            width: 60%;
            float: left;
        }

        .field {
            margin-bottom: 5px;
        }

        .field label {
            display: block;
            margin-bottom: 2px;
        }

        .field span {
            display: block;
            padding: 2px 10px;
            font-weight: bold;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            min-height: 24px;
        }

        /* Images on the right */
        .image-top {
            position: absolute;
            top: 0px;
            right: 40px;
            width: 160px;
            height: 160px;
            border: 1px solid #ccc;
            object-fit: cover;
        }

        .image-bottom {
            position: absolute;
            top: 190px;
            right: 40px;
            width: 160px;
            height: 160px;
            border: 1px solid #ccc;
            object-fit: contain;
        }

        /* Top Titles */
        .top-titles {
            text-align: center;
        }

        .top-titles h1,
        .top-titles h2 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        /* Result Section */
        .result-section {
            text-align: center;
            margin: 145mm 0mm 5mm 0;
            padding: 5mm;
            border-top: 2px solid #2c3e50;
            border-bottom: 2px solid #2c3e50;
        }

        .result-text {
            font-size: 14px !important;
            font-weight: bold;
            color: #2c3e50;
        }

        .clear-status {
            font-size: 14px !important;
            color: #2e8b57;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Signature Block */
        .signature-block {
            margin-top: -30px;
            text-align: center;
            position: relative;
        }

        .signature-block .signature-image {
            width: 50mm;
            height: auto;
            z-index: 2;
            margin-bottom: -50px;
        }

        .signature-block h1,
        .signature-block h2 {
            font-size: 14px !important;
            margin: 0;
        }

        .sign-line {
            width: 50mm;
            border-top: 1px solid #000;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Watermark -->
    <div class="watermark">
        <img src="{{ public_path('upload/userImge/1747930132imgimages.jpeg') }}" alt="Watermark">
    </div>

    <!-- Header -->
    <header>
        <div style="height: 100%; display: flex; align-items: center; justify-content: center;">
            <img src="{{ public_path('upload/1714911070.1000051226.jpg') }}" alt="Logo" style="max-height: 100%; width: auto;">
        </div>
    </header>

    <!-- Footer -->
    <footer>
        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
            <p style="margin: 0; font-size: 12px;">
                Qaybta Baarista Dambiyada Galmudug (C.I.D) <br>
                <strong>Tel: 0616378522 | Email: galmudugcid@gmail.com | Dhusamareb, Galmudug</strong>
            </p>
        </div>
        <p>
            Boga <span class="pagenum"></span> | Tarikhda Ladabacay {{ now()->format('Y-m-d H:i') }}
        </p>
    </footer>

    <!-- Main Content -->
    <main>
        <!-- Header Line -->
        <div class="hr-top-labels">
            <div class="labels">
                <span><strong>Ref: {{ $certificate->certificate_number }}</strong></span>
                <span style="float: right;"><strong>Date: {{ $certificate->issue_date }}</strong></span>
            </div>
            <hr>
        </div>

        <!-- Top Titles -->
        <div class="top-titles">
            <h1>SHAHAADADA DAMBI LA`AANTA</h1>
            <h2>NON-CRIMINAL CERTIFICATE</h2>
        </div>

        <!-- Certificate Container -->
        <div class="certificate-container">
            <!-- Left Form Section -->
            <div class="form-section">
                <div class="field">
                    <label>Magaca / Name:</label>
                    <span>{{ $certificate->application->applicant->first_name ?? '-' }}</span>
                </div>
                <div class="field">
                    <label>Magaca Hooyo / Mother Name:</label>
                    <span>Dahabo Axmed Cali</span>
                </div>
                <div class="field">
                    <label>Goobta Dhalashada / Place of Birth:</label>
                    <span>MOGADISHU</span>
                </div>
                <div class="field">
                    <label>Taariikhda Dhalashada / Date of Birth:</label>
                    <span>{{ $certificate->application->applicant->dob ?? '-' }}</span>
                </div>
                <div class="field">
                    <label>Jinsiga / Gender:</label>
                    <span>{{ $certificate->application->applicant->gender ?? '-' }}</span>
                </div>
                <div class="field">
                    <label>Jinsiyadda / Nationality:</label>
                    <span>Somalia</span>
                </div>
                <div class="field">
                    <label>Aqoonsiga Qaranka / National ID:</label>
                    <span>{{ $certificate->application->applicant->national_id ?? '-' }}</span>
                </div>
                <div class="field">
                    <label>Ujeedada Bixinta / Purpose of Issue:</label>
                    <span>{{ $certificate->application->application_type ?? '-' }}</span>
                </div>
            </div>

            <!-- Right Images -->
            <img src="{{ public_path($certificate->application->applicant->photo_path) }}" class="image-top" alt="Applicant Photo">
            <img src="{{ public_path('upload/QR_code_for_mobile_English_Wikipedia.png') }}" class="image-bottom" alt="QR Code">

            <!-- Result Section -->
            <div class="result-section">
                <div class="result-text">CRIMINAL RECORD CHECK RESULT</div>
                <div class="clear-status">
                    {{ $certificate->status == 'active'
                        ? 'Waxaa halkaan lagu cadeeyay in qofka kor ku xusan lagu baaray Xafiiska Diiwaanka Dembiyada C.I.D Galmudug lagana waayay wax dambi hore ah:'
                        : 'Record Found' }}
                </div>
                <br>
                <div class="clear-status">
                    {{ $certificate->status == 'active'
                        ? 'It is hereby certified that the above person is investigated in the criminal record keeping office CID Galmudug and not found any previous crime.'
                        : 'Record Found' }}
                </div>
            </div>
        </div>

        <!-- Signature Block -->
        <div class="signature-block">
            <img src="{{ public_path('upload/Screenshot_2025-08-24_205309-Photoroom.png') }}" alt="Seal" class="signature-image">
            <h1>G/Les Cilmii Cabdi Cumar</h1>
            <h2>Taliyaha Qaybta Baarista Dambiyada Galmudug (C.I.D)</h2>
        </div>
    </main>
</body>

</html>

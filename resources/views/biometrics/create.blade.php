<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Biometrics | Hybrid Capture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            color: white;
            font-weight: 600;
        }
        
        .biometric-section {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary-color);
        }
        
        .scan-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .scan-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(67, 97, 238, 0.3);
        }
        
        .scan-btn:active {
            transform: translateY(0);
        }
        
        .scan-btn .spinner-border {
            display: none;
            width: 1rem;
            height: 1rem;
        }
        
        .scan-btn.scanning .spinner-border {
            display: inline-block;
        }
        
        .scan-btn.scanning .btn-text {
            display: none;
        }
        
        .fingerprint-icon {
            font-size: 3rem;
            color: #adb5bd;
            transition: all 0.3s ease;
        }
        
        .fingerprint-icon.capturing {
            color: var(--warning-color);
            animation: pulse 1.5s infinite;
        }
        
        .fingerprint-icon.success {
            color: var(--success-color);
        }
        
        .fingerprint-icon.error {
            color: var(--danger-color);
        }
        
        .status-indicator {
            height: 8px;
            width: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
        
        .status-ready {
            background-color: #adb5bd;
        }
        
        .status-capturing {
            background-color: var(--warning-color);
        }
        
        .status-success {
            background-color: var(--success-color);
        }
        
        .status-error {
            background-color: var(--danger-color);
        }
        
        .scan-result {
            min-height: 120px;
            max-height: 200px;
            overflow-y: auto;
            font-family: 'Courier New', monospace;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .api-selector {
            border-radius: 6px;
            padding: 0.5rem;
            background-color: #e9ecef;
            font-size: 0.9rem;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .help-text {
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-size: 0.8rem;
            margin-right: 8px;
        }
        
        .connection-error {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .troubleshoot-list {
            font-size: 0.9rem;
        }
        
        .connection-diagram {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .diagram-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 6px;
            background: #f8f9fa;
        }
        
        .diagram-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 12px;
            flex-shrink: 0;
        }
        
        /* Fingerprint scanner simulation */
        .fingerprint-scanner {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: linear-gradient(145deg, #2c3e50, #1a2530);
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid #34495e;
        }
        
        .scanner-glow {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 152, 219, 0.4) 0%, rgba(44, 62, 80, 0) 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .scanner-active .scanner-glow {
            opacity: 1;
            animation: scannerPulse 2s infinite;
        }
        
        @keyframes scannerPulse {
            0% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.05); opacity: 0.7; }
            100% { transform: scale(1); opacity: 0.4; }
        }
        
        .fingerprint-lines {
            width: 70%;
            height: 70%;
            background-image: 
                radial-gradient(circle, transparent 20%, #2c3e50 20%, #2c3e50 26%, transparent 26%, transparent 40%, #2c3e50 40%, #2c3e50 43%, transparent 43%),
                repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(52, 152, 219, 0.2) 3px, rgba(52, 152, 219, 0.2) 6px);
            border-radius: 50%;
            opacity: 0.7;
        }
        
        .scanner-active .fingerprint-lines {
            animation: linesMove 3s infinite linear;
        }
        
        @keyframes linesMove {
            from { background-position: 0 0; }
            to { background-position: 0 30px; }
        }
        
        .scan-progress {
            width: 0%;
            height: 6px;
            background: var(--primary-color);
            border-radius: 3px;
            margin: 15px auto;
            transition: width 0.5s ease;
            max-width: 300px;
        }
        
        .fingerprint-image {
            display: none;
            max-width: 100%;
            border-radius: 8px;
            margin: 15px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .capture-time {
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h4 class="mb-0"><i class="fas fa-fingerprint me-2"></i>Register Biometrics (Hybrid Capture)</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="#" method="POST">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="applicant_id" class="form-label fw-semibold">
                                        <span class="step-number">1</span>Select Applicant
                                    </label>
                                    <select name="applicant_id" id="applicant_id" class="form-select" required>
                                        <option value="">-- Select Applicant --</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Robert Johnson</option>
                                    </select>
                                    <div class="help-text mt-1">Choose the applicant to register biometrics for</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="api-selector mt-4 mt-md-0">
                                        <label class="form-label fw-semibold"><i class="fas fa-plug me-1"></i>Capture API Preference</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="api_preference" id="api_cloud" value="cloud" checked>
                                            <label class="form-check-label" for="api_cloud">
                                                Cloud API (Primary)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="api_preference" id="api_local" value="local">
                                            <label class="form-check-label" for="api_local">
                                                Local API (Fallback)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="biometric-section">
                                <label class="form-label fw-semibold">
                                    <span class="step-number">2</span>Fingerprint Capture
                                </label>
                                
                                <div class="d-flex flex-column align-items-center my-4">
                                    <!-- Fingerprint Scanner Simulation -->
                                    <div class="fingerprint-scanner">
                                        <div class="scanner-glow"></div>
                                        <div class="fingerprint-lines"></div>
                                    </div>
                                    
                                    <div class="scan-progress" id="scanProgress"></div>
                                    
                                    <div class="capture-time" id="captureTime">Capture time: <span id="timeValue">00:00</span></div>
                                    
                                    <!-- Captured Fingerprint Image -->
                                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'%3E%3Cpath fill='%234361ee' d='M100 50c-27.614 0-50 22.386-50 50s22.386 50 50 50 50-22.386 50-50-22.386-50-50-50zm0 90c-22.091 0-40-17.909-40-40s17.909-40 40-40 40 17.909 40 40-17.909 40-40 40z'/%3E%3Cpath fill='%234361ee' d='M120 100c0 11.046-8.954 20-20 20s-20-8.954-20-20 8.954-20 20-20 20 8.954 20 20z'/%3E%3Cpath fill='%234361ee' d='M100 70c-16.542 0-30 13.458-30 30s13.458 30 30 30 30-13.458 30-30-13.458-30-30-30zm0 50c-11.046 0-20-8.954-20-20s8.954-20 20-20 20 8.954 20 20-8.954 20-20 20z'/%3E%3C/svg%3E" 
                                         class="fingerprint-image" id="capturedFingerprint" alt="Captured fingerprint">
                                    
                                    <div class="d-flex flex-column align-items-center w-100 mt-3">
                                        <button type="button" id="scanBtn" class="btn btn-primary scan-btn px-4 py-2">
                                            <span class="btn-text"><i class="fas fa-hand-pointer me-2"></i>Capture Fingerprint</span>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </button>
                                        
                                        <div class="mt-3 w-100">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="text-muted">Capture Status:</small>
                                                <span id="statusIndicator" class="status-indicator status-ready"></span>
                                                <small id="statusText" class="text-muted">Ready</small>
                                            </div>
                                            
                                            <label class="form-label small">Template Data:</label>
                                            <pre id="scanResult" class="scan-result bg-light p-3 rounded"></pre>
                                            <input type="hidden" name="fingerprint_template" id="fingerprint_template">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="help-text">
                                    <i class="fas fa-info-circle me-1"></i> 
                                    Ensure the fingerprint scanner is connected and properly configured. 
                                    The system will attempt Cloud API first, then fall back to Local API if needed.
                                </div>
                            </div>

                            <!-- Connection Error Alert -->
                            <div id="connectionError" class="connection-error alert alert-danger mt-4">
                                <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Connection Error</h5>
                                <p class="mb-3">Unable to reach the fingerprint capture service. Please check:</p>
                                <ul class="troubleshoot-list mb-0">
                                    <li>Your internet connection for Cloud API access</li>
                                    <li>That the local service is running for Local API</li>
                                    <li>Firewall settings that might block connections</li>
                                    <li>Scanner device connections and drivers</li>
                                </ul>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" id="submitBtn" class="btn btn-success px-4" disabled>
                                    <i class="fas fa-save me-2"></i>Save Biometrics
                                </button>
                                <a href="#" class="btn btn-secondary px-4">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded">
                    <h6 class="mb-3"><i class="fas fa-lightbulb me-2 text-warning"></i>Usage Tips</h6>
                    <ul class="mb-0 small">
                        <li>Make sure the applicant's finger is clean and dry before capture</li>
                        <li>Press the finger firmly against the scanner without moving</li>
                        <li>If capture fails, try adjusting finger position and attempt again</li>
                        <li>Check device connections if the scanner isn't responding</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scanBtn = document.getElementById('scanBtn');
            const scanResult = document.getElementById('scanResult');
            const fingerprintTemplate = document.getElementById('fingerprint_template');
            const statusIndicator = document.getElementById('statusIndicator');
            const statusText = document.getElementById('statusText');
            const submitBtn = document.getElementById('submitBtn');
            const applicantSelect = document.getElementById('applicant_id');
            const connectionError = document.getElementById('connectionError');
            const scanner = document.querySelector('.fingerprint-scanner');
            const scanProgress = document.getElementById('scanProgress');
            const capturedFingerprint = document.getElementById('capturedFingerprint');
            const timeValue = document.getElementById('timeValue');
            
            let timerInterval;
            let seconds = 0;
            
            // Update submit button state based on form completeness
            function updateSubmitButton() {
                if (applicantSelect.value && fingerprintTemplate.value) {
                    submitBtn.removeAttribute('disabled');
                } else {
                    submitBtn.setAttribute('disabled', 'true');
                }
            }
            
            applicantSelect.addEventListener('change', updateSubmitButton);
            
            // Start timer for capture process
            function startTimer() {
                seconds = 0;
                clearInterval(timerInterval);
                timerInterval = setInterval(() => {
                    seconds++;
                    const mins = Math.floor(seconds / 60);
                    const secs = seconds % 60;
                    timeValue.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
                }, 1000);
            }
            
            // Stop timer
            function stopTimer() {
                clearInterval(timerInterval);
            }
            
            // Simulate API call with high probability of failure for demonstration
            async function tryCapture(url) {
                // Simulate network delay
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Simulate high probability of failure for demonstration
                if (Math.random() > 0.2) {
                    throw new Error("Failed to connect to the server. Network error or server unavailable.");
                }
                
                // Simulate successful response
                return {
                    TemplateBase64: "SUQzBAAAAAAAI1BRUExFVAwAFwAn+MX4aPcB+Ln3vPjS+Ov5VfpD/Or9Kf8tAJcA",
                    ErrorCode: 0,
                    Quality: 80,
                    Score: 65
                };
            }

            scanBtn.addEventListener('click', async () => {
                // Reset error message
                connectionError.style.display = 'none';
                capturedFingerprint.style.display = 'none';
                
                // UI updates for scanning state
                scanBtn.classList.add('scanning');
                scanner.classList.add('scanner-active');
                statusIndicator.className = 'status-indicator status-capturing';
                statusText.textContent = 'Capturing...';
                statusText.className = 'text-warning';
                scanResult.textContent = "Attempting to connect to fingerprint service...";
                
                // Start progress bar animation
                let progress = 0;
                const progressInterval = setInterval(() => {
                    progress += 5;
                    scanProgress.style.width = `${progress}%`;
                    if (progress >= 100) clearInterval(progressInterval);
                }, 200);
                
                // Start timer
                startTimer();
                
                try {
                    let data;
                    const apiPreference = document.querySelector('input[name="api_preference"]:checked').value;
                    let cloudFirst = apiPreference === 'cloud';
                    
                    if (cloudFirst) {
                        try {
                            data = await tryCapture("https://webapi.secugen.com/SGIFPCapture");
                            scanResult.innerHTML = "<span class='text-success'>✓ Cloud API successful</span>\n" + 
                                                  JSON.stringify(data, null, 2);
                        } catch (cloudError) {
                            console.warn("Cloud API failed, trying local service...");
                            try {
                                data = await tryCapture("https://localhost:8000/SGIFPCapture");
                                scanResult.innerHTML = "<span class='text-warning'>⚠ Cloud API failed, used Local API</span>\n" + 
                                                      JSON.stringify(data, null, 2);
                            } catch (localError) {
                                throw new Error("Both Cloud and Local APIs failed: " + localError.message);
                            }
                        }
                    } else {
                        try {
                            data = await tryCapture("https://localhost:8000/SGIFPCapture");
                            scanResult.innerHTML = "<span class='text-success'>✓ Local API successful</span>\n" + 
                                                  JSON.stringify(data, null, 2);
                        } catch (localError) {
                            console.warn("Local API failed, trying cloud service...");
                            try {
                                data = await tryCapture("https://webapi.secugen.com/SGIFPCapture");
                                scanResult.innerHTML = "<span class='text-warning'>⚠ Local API failed, used Cloud API</span>\n" + 
                                                      JSON.stringify(data, null, 2);
                            } catch (cloudError) {
                                throw new Error("Both Local and Cloud APIs failed: " + cloudError.message);
                            }
                        }
                    }

                    // Save template and update UI for success
                    if (data.TemplateBase64) {
                        fingerprintTemplate.value = data.TemplateBase64;
                        statusIndicator.className = 'status-indicator status-success';
                        statusText.textContent = 'Capture successful';
                        statusText.className = 'text-success';
                        
                        // Show captured fingerprint image
                        capturedFingerprint.style.display = 'block';
                        
                        // Enable submit button if applicant is selected
                        updateSubmitButton();
                    } else {
                        throw new Error("No fingerprint template returned. ErrorCode: " + (data.ErrorCode || 'Unknown'));
                    }

                } catch (error) {
                    // UI updates for error state
                    console.error("Capture error:", error);
                    scanResult.textContent = "Error: " + error.message;
                    statusIndicator.className = 'status-indicator status-error';
                    statusText.textContent = 'Capture failed';
                    statusText.className = 'text-danger';
                    
                    // Show connection error message
                    connectionError.style.display = 'block';
                    
                    // Show detailed error info
                    if (error.message.includes('Failed to connect')) {
                        scanResult.innerHTML = "<span class='text-danger'>Connection error:</span> Unable to reach the fingerprint capture service. " +
                                             "Please check your internet connection for Cloud API or ensure the local service is running for Local API.";
                    } else {
                        scanResult.innerHTML = "<span class='text-danger'>Error:</span> " + error.message;
                    }
                } finally {
                    scanBtn.classList.remove('scanning');
                    scanner.classList.remove('scanner-active');
                    scanProgress.style.width = '0%';
                    stopTimer();
                }
            });
        });
    </script>
</body>
</html>
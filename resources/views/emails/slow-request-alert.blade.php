<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Slow Request Alert</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }
            .alert-box {
                background-color: #fff3cd;
                border: 1px solid #ffc107;
                border-radius: 4px;
                padding: 15px;
                margin-bottom: 20px;
            }
            .alert-title {
                color: #856404;
                font-weight: bold;
                font-size: 18px;
                margin-bottom: 10px;
            }
            .info-box {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 4px;
                padding: 15px;
                margin-bottom: 15px;
            }
            .info-label {
                font-weight: bold;
                color: #495057;
                margin-bottom: 5px;
            }
            .info-value {
                color: #212529;
                font-family: 'Courier New', monospace;
                background-color: #fff;
                padding: 8px;
                border-radius: 3px;
                word-break: break-all;
            }
            .url-box {
                background-color: #1e1e1e;
                color: #d4d4d4;
                padding: 15px;
                border-radius: 4px;
                overflow-x: auto;
                font-family: 'Courier New', monospace;
                font-size: 13px;
                line-height: 1.5;
            }
            .time-badge {
                display: inline-block;
                background-color: #dc3545;
                color: white;
                padding: 4px 12px;
                border-radius: 12px;
                font-weight: bold;
                font-size: 14px;
            }
            .status-badge {
                display: inline-block;
                padding: 4px 12px;
                border-radius: 12px;
                font-weight: bold;
                font-size: 14px;
            }
            .status-2xx {
                background-color: #28a745;
                color: white;
            }
            .status-3xx {
                background-color: #17a2b8;
                color: white;
            }
            .status-4xx {
                background-color: #ffc107;
                color: #212529;
            }
            .status-5xx {
                background-color: #dc3545;
                color: white;
            }
            .footer {
                margin-top: 30px;
                padding-top: 20px;
                border-top: 1px solid #dee2e6;
                color: #6c757d;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="alert-box">
            <div class="alert-title">⚠️ Slow Request Detected</div>
            <p>An HTTP request took longer than expected to complete.</p>
        </div>

        <div class="info-box">
            <div class="info-label">Response Time</div>
            <div>
                <span class="time-badge">{{ number_format($duration, 2) }} ms</span>
            </div>
        </div>

        <div class="info-box">
            <div class="info-label">HTTP Method</div>
            <div class="info-value">{{ $method }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">URL</div>
            <div class="url-box">{{ $url }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">Status Code</div>
            <div>
                <span class="status-badge status-{{ substr((string) $statusCode, 0, 1) }}xx">{{ $statusCode }}</span>
            </div>
        </div>

        <div class="info-box">
            <div class="info-label">IP Address</div>
            <div class="info-value">{{ $ip }}</div>
        </div>

        @if ($userId)
            <div class="info-box">
                <div class="info-label">User ID</div>
                <div class="info-value">{{ $userId }}</div>
            </div>
        @endif

        <div class="info-box">
            <div class="info-label">Application</div>
            <div class="info-value">{{ $appName }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">Environment</div>
            <div class="info-value">{{ config('app.env') }}</div>
        </div>

        <div class="footer">
            <p>This is an automated alert from {{ $appName }}.</p>
            <p>Generated at: {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </body>
</html>

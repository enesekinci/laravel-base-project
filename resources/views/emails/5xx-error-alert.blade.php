<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>5xx Server Error Alert</title>
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
                background-color: #f8d7da;
                border: 1px solid #dc3545;
                border-radius: 4px;
                padding: 15px;
                margin-bottom: 20px;
            }
            .alert-title {
                color: #721c24;
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
            .exception-box {
                background-color: #1e1e1e;
                color: #d4d4d4;
                padding: 15px;
                border-radius: 4px;
                overflow-x: auto;
                font-family: 'Courier New', monospace;
                font-size: 12px;
                line-height: 1.5;
                max-height: 400px;
                overflow-y: auto;
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
            .error-badge {
                display: inline-block;
                background-color: #dc3545;
                color: white;
                padding: 4px 12px;
                border-radius: 12px;
                font-weight: bold;
                font-size: 14px;
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
            <div class="alert-title">🚨 5xx Server Error Detected</div>
            <p>A server error (5xx) occurred in the application.</p>
        </div>

        <div class="info-box">
            <div class="info-label">Exception Type</div>
            <div class="info-value">{{ get_class($exception) }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">Error Message</div>
            <div class="info-value">{{ $exception->getMessage() }}</div>
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
            <div class="info-label">Exception Stack Trace</div>
            <div class="exception-box">{{ $exception->getTraceAsString() }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">File</div>
            <div class="info-value">{{ $exception->getFile() }}:{{ $exception->getLine() }}</div>
        </div>

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
            <p>
                <strong>Note:</strong>
                This alert is rate-limited. Similar errors within 5 minutes will not trigger additional emails.
            </p>
        </div>
    </body>
</html>

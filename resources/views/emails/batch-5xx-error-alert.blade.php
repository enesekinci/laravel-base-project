<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Batch 5xx Error Alert</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 1000px;
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
            .summary-box {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 4px;
                padding: 15px;
                margin-bottom: 20px;
            }
            .summary-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-top: 10px;
            }
            .summary-item {
                background-color: #fff;
                padding: 10px;
                border-radius: 3px;
            }
            .summary-label {
                font-size: 12px;
                color: #6c757d;
                margin-bottom: 5px;
            }
            .summary-value {
                font-size: 18px;
                font-weight: bold;
                color: #212529;
            }
            .query-item {
                background-color: #fff;
                border: 1px solid #dee2e6;
                border-radius: 4px;
                padding: 15px;
                margin-bottom: 15px;
            }
            .query-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid #dee2e6;
            }
            .query-number {
                font-weight: bold;
                color: #495057;
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
            .sql-box {
                background-color: #1e1e1e;
                color: #d4d4d4;
                padding: 15px;
                border-radius: 4px;
                overflow-x: auto;
                font-family: 'Courier New', monospace;
                font-size: 13px;
                line-height: 1.5;
                margin-top: 10px;
            }
            .bindings-box {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 3px;
                padding: 10px;
                margin-top: 10px;
                font-family: 'Courier New', monospace;
                font-size: 12px;
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
            <div class="alert-title">🚨 {{ $totalErrors }} 5xx Server Error{{ $totalErrors > 1 ? 's' : '' }} Detected</div>
            <p>Multiple server errors occurred.</p>
        </div>

        <div class="summary-box">
            <div style="font-weight: bold; margin-bottom: 10px">Summary</div>
            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-label">Total Errors</div>
                    <div class="summary-value">{{ $totalErrors }}</div>
                </div>
            </div>
        </div>

        @foreach ($errors as $index => $error)
            <div class="query-item">
                <div class="query-header">
                    <div class="query-number">Error #{{ $index + 1 }}</div>
                    <div>
                        <span class="time-badge">Status: {{ $error['status_code'] }}</span>
                    </div>
                </div>
                <div class="sql-box">
                    <strong>Exception:</strong>
                    {{ $error['exception'] }}
                    <br />
                    <strong>Message:</strong>
                    {{ $error['message'] }}
                    <br />
                    <strong>URL:</strong>
                    {{ $error['url'] }}
                    <br />
                    <strong>Method:</strong>
                    {{ $error['method'] }}
                    <br />
                    <strong>IP:</strong>
                    {{ $error['ip'] }}
                    <br />
                    @if ($error['user_id'])
                        <strong>User ID:</strong>
                        {{ $error['user_id'] }}
                        <br />
                    @endif

                    <strong>File:</strong>
                    {{ $error['file'] }}:{{ $error['line'] }}
                </div>
            </div>
        @endforeach

        <div class="footer">
            <p>This is an automated alert from {{ $appName }}.</p>
            <p>Generated at: {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </body>
</html>

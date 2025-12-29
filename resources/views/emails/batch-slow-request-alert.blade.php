<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Batch Slow Request Alert</title>
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
            <div class="alert-title">⚠️ {{ $totalRequests }} Slow Request{{ $totalRequests > 1 ? 's' : '' }} Detected</div>
            <p>Multiple HTTP requests took longer than expected to execute.</p>
        </div>

        <div class="summary-box">
            <div style="font-weight: bold; margin-bottom: 10px">Summary</div>
            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-label">Total Requests</div>
                    <div class="summary-value">{{ $totalRequests }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Total Duration</div>
                    <div class="summary-value">{{ number_format($totalDuration, 2) }} ms</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Average Duration</div>
                    <div class="summary-value">{{ number_format($avgDuration, 2) }} ms</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Max Duration</div>
                    <div class="summary-value">{{ number_format($maxDuration, 2) }} ms</div>
                </div>
            </div>
        </div>

        @foreach ($requests as $index => $request)
            <div class="query-item">
                <div class="query-header">
                    <div class="query-number">Request #{{ $index + 1 }}</div>
                    <div>
                        <span class="time-badge">{{ number_format($request['duration'], 2) }} ms</span>
                    </div>
                </div>
                <div class="sql-box">
                    <strong>Method:</strong>
                    {{ $request['method'] }}
                    <br />
                    <strong>URL:</strong>
                    {{ $request['url'] }}
                    <br />
                    <strong>Status:</strong>
                    {{ $request['status_code'] }}
                    <br />
                    <strong>IP:</strong>
                    {{ $request['ip'] }}
                    <br />
                    @if ($request['user_id'])
                        <strong>User ID:</strong>
                        {{ $request['user_id'] }}
                    @endif
                </div>
            </div>
        @endforeach

        <div class="footer">
            <p>This is an automated alert from {{ $appName }}.</p>
            <p>Generated at: {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </body>
</html>

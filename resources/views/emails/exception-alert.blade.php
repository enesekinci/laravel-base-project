<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exception Alert</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 900px;
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
            font-size: 12px;
            text-transform: uppercase;
        }
        .info-value {
            color: #212529;
            font-family: 'Courier New', monospace;
            background-color: #fff;
            padding: 8px;
            border-radius: 3px;
            word-break: break-all;
            font-size: 13px;
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
        .stack-trace {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #444;
        }
        .stack-item {
            margin-bottom: 8px;
            padding-left: 10px;
            border-left: 2px solid #555;
        }
        .file-path {
            color: #4ec9b0;
        }
        .line-number {
            color: #ce9178;
        }
        .method-name {
            color: #dcdcaa;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 12px;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
            margin-right: 5px;
        }
        .badge-error {
            background-color: #dc3545;
            color: white;
        }
        .badge-warning {
            background-color: #ffc107;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="alert-box">
        <div class="alert-title">🚨 Unhandled Exception Detected</div>
        <p>An unexpected exception occurred in the application.</p>
    </div>

    <div class="info-box">
        <div class="info-label">Exception Type</div>
        <div class="info-value">
            <span class="badge badge-error">{{ get_class($exception) }}</span>
        </div>
    </div>

    <div class="info-box">
        <div class="info-label">Message</div>
        <div class="info-value">{{ $exception->getMessage() }}</div>
    </div>

    <div class="info-box">
        <div class="info-label">File</div>
        <div class="info-value">{{ $exception->getFile() }}</div>
    </div>

    <div class="info-box">
        <div class="info-label">Line</div>
        <div class="info-value">{{ $exception->getLine() }}</div>
    </div>

    @if($url)
    <div class="info-box">
        <div class="info-label">URL</div>
        <div class="info-value">{{ $url }}</div>
    </div>
    @endif

    @if(!empty($context))
    <div class="info-box">
        <div class="info-label">Additional Context</div>
        <div class="info-value">
            <pre style="margin: 0; white-space: pre-wrap;">{{ json_encode($context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
        </div>
    </div>
    @endif

    <div class="info-box">
        <div class="info-label">Stack Trace</div>
        <div class="exception-box">
            @foreach($exception->getTrace() as $index => $trace)
                <div class="stack-item">
                    <span class="method-name">
                        @if(isset($trace['class']))
                            {{ $trace['class'] }}{{ $trace['type'] ?? '::' }}{{ $trace['function'] ?? 'unknown' }}()
                        @elseif(isset($trace['function']))
                            {{ $trace['function'] }}()
                        @else
                            unknown
                        @endif
                    </span>
                    @if(isset($trace['file']))
                        <br>
                        <span class="file-path">{{ $trace['file'] }}</span>
                        @if(isset($trace['line']))
                            <span class="line-number">:{{ $trace['line'] }}</span>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="info-box">
        <div class="info-label">Application</div>
        <div class="info-value">{{ $appName }}</div>
    </div>

    <div class="info-box">
        <div class="info-label">Environment</div>
        <div class="info-value">{{ config('app.env') }}</div>
    </div>

    <div class="info-box">
        <div class="info-label">Timestamp</div>
        <div class="info-value">{{ now()->format('Y-m-d H:i:s') }}</div>
    </div>

    <div class="footer">
        <p>This is an automated alert from {{ $appName }}.</p>
        <p>Generated at: {{ now()->format('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>


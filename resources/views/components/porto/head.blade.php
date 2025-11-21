<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title ?? 'Porto - Bootstrap eCommerce Template' }}</title>

    <meta name="keywords" content="{{ $keywords ?? 'HTML5 Template' }}" />
    <meta name="description" content="{{ $description ?? 'Porto - Bootstrap eCommerce Template' }}">
    <meta name="author" content="{{ $author ?? 'SW-THEMES' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/porto/assets/images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '/porto/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/porto/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    @if(isset($demoCss) && $demoCss)
        <link rel="stylesheet" href="/porto/assets/css/{{ $demoCss }}.min.css">
    @else
        <link rel="stylesheet" href="/porto/assets/css/style.min.css">
    @endif
    <link rel="stylesheet" type="text/css" href="/porto/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/porto/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

    @stack('styles')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

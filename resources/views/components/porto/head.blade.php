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
        @if(isset($demoCss) && $demoCss === 'demo34')
            WebFontConfig = {
                google: { families: ['Playfair+Display:200,300,400,400italic,500,600,700,700italic,800,900italic', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,600,700'] }
            };
        @elseif(isset($demoCss) && $demoCss === 'demo42')
            WebFontConfig = {
                google: { families: [ 'Open+Sans:400,600', 'Poppins:400,500,600,700' ] }
            };
        @elseif(isset($demoCss) && $demoCss === 'demo23')
            WebFontConfig = {
                google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Nanum+Brush+Script:400,700,800' ] }
            };
        @else
            WebFontConfig = {
                google: {
                    families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
                }
            };
        @endif
        (function(d) {
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
    @if(isset($demoCss))
        <link rel="stylesheet" href="/porto/assets/css/{{ $demoCss }}.min.css">
    @endif
    <link rel="stylesheet" type="text/css" href="/porto/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/porto/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
    
    @stack('styles')
</head>


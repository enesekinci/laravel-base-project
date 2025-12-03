<x-mail::message>
    # 📊 PostgreSQL Performans Raporu {{ config('app.name') }} uygulamasında PostgreSQL performans raporu oluşturuldu.

    @if (count($issues) > 0)
        ## ⚠️ Tespit Edilen Sorunlar ({{ count($issues) }})

        @foreach ($issues as $issue)
            <x-mail::panel>
                ###
                {{
                    match ($issue['severity']) {
                        'critical' => '🔴 Kritik',
                        'warning' => '🟡 Uyarı',
                        'info' => '🔵 Bilgi',
                        default => '⚪ Bilgi',
                    }
                }}
                {{ $issue['title'] }}

                {{ $issue['message'] }}
            </x-mail::panel>
        @endforeach
    @else
        ## ✅ Sorun Tespit Edilmedi Tüm performans metrikleri normal seviyede.
    @endif

    ## 📈 Performans Metrikleri ### 💾 Database Boyutu **{{ $metrics['database_size']['size'] ?? 'N/A' }}** ### 🎯 Cache Hit Ratio - **Heap Cache Hit Ratio:**
    {{ number_format($metrics['cache_hit_ratio']['heap_hit_ratio'] ?? 0, 2) }}% - **Index Cache Hit Ratio:** {{ number_format($metrics['cache_hit_ratio']['idx_hit_ratio'] ?? 0, 2) }}%

    @if ($metrics['cache_hit_ratio']['heap_hit_ratio'] < 90)
        ⚠️ Heap cache hit ratio düşük (önerilen: >90%)
    @endif

    @if ($metrics['cache_hit_ratio']['idx_hit_ratio'] < 95)
        ⚠️ Index cache hit ratio düşük (önerilen: >95%)
    @endif

    ### 🔌 Connection İstatistikleri - **Toplam:** {{ $metrics['connections']['total'] ?? 0 }}/{{ $metrics['connections']['max_connections'] ?? 100 }} - **Aktif:**
    {{ $metrics['connections']['active'] ?? 0 }} - **Idle:** {{ $metrics['connections']['idle'] ?? 0 }} - **Idle in Transaction:** {{ $metrics['connections']['idle_in_transaction'] ?? 0 }}

    @if ((($metrics['connections']['total'] ?? 0) / ($metrics['connections']['max_connections'] ?? 100)) * 100 > 80)
        ⚠️ Connection kullanımı yüksek!
    @endif

    ### 🗑️ Dead Tuples {{ count($metrics['dead_tuples'] ?? []) }} tabloda dead tuple tespit edildi.

    @if (count($metrics['dead_tuples'] ?? []) > 0)
        **En yüksek dead tuple oranına sahip tablolar:**
        @foreach (array_slice($metrics['dead_tuples'] ?? [], 0, 5) as $table)
            - **{{ $table['table'] }}:** %{{ number_format($table['dead_ratio'], 2) }} ({{ number_format($table['dead_tuples']) }} dead tuples)
        @endforeach
    @endif

    ### 🔒 Lock İstatistikleri - **Blocking Locks:** {{ $metrics['locks']['blocking_locks'] ?? 0 }}

    @if (($metrics['locks']['blocking_locks'] ?? 0) > 0)
        ⚠️ Blocking lock'lar tespit edildi! Query'ler bekliyor olabilir.
    @endif

    ### 🧹 Vacuum İstatistikleri - **Hiç vacuum edilmemiş:** {{ $metrics['vacuum_stats']['never_vacuumed'] ?? 0 }} tablo - **7 günden fazla vacuum edilmemiş:**
    {{ $metrics['vacuum_stats']['not_vacuumed_7days'] ?? 0 }} tablo ### 📊 Büyük Tablolar (Top 5)
    @foreach (array_slice($metrics['large_tables'] ?? [], 0, 5) as $table)
        - **{{ $table['table'] }}:** {{ $table['total_size'] }} ({{ number_format($table['row_count']) }} satır)
    @endforeach

    @if (isset($metrics['slow_queries']) && count($metrics['slow_queries']) > 0)
        ### 🐌 Slow Queries (Top 5)
        @foreach (array_slice($metrics['slow_queries'], 0, 5) as $query)
                - **Mean Time:** {{ number_format($query['mean_time'], 2) }}ms | **Calls:** {{ number_format($query['calls']) }} ```
                {{ mb_substr($query['query'], 0, 150) }}{{ mb_strlen($query['query']) > 150 ? '...' : '' }} ```
        @endforeach
    @endif

    --- **Rapor Tarihi:** {{ now()->format('d.m.Y H:i:s') }} **Ortam:** {{ config('app.env') }}

    <x-mail::button :url="config('app.url')">Uygulamaya Git</x-mail::button>

    Bu otomatik bir rapor mesajıdır. Sorunları düzeltmek için PostgreSQL yöneticinizle iletişime geçin. Teşekkürler,
    <br />
    {{ config('app.name') }}
</x-mail::message>

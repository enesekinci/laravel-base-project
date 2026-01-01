<div>
    <x-header title="Dashboard" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-badge value="{{ now()->format('d.m.Y') }}" class="badge-primary" />
        </x-slot>
    </x-header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- İstatistik Kartları --}}
        <x-card shadow class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Toplam Ziyaret</p>
                    <p class="text-2xl font-bold">423,964</p>
                </div>
                <x-icon name="o-eye" class="w-12 h-12 text-primary" />
            </div>
        </x-card>

        <x-card shadow class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Ödemeli Ziyaret</p>
                    <p class="text-2xl font-bold">7,929</p>
                </div>
                <x-icon name="o-currency-dollar" class="w-12 h-12 text-success" />
            </div>
        </x-card>

        <x-card shadow class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Toplam Bakiye</p>
                    <p class="text-2xl font-bold">₺41,741.42</p>
                </div>
                <x-icon name="o-banknotes" class="w-12 h-12 text-warning" />
            </div>
        </x-card>
    </div>

    <div class="mt-6">
        <x-card shadow>
            <x-slot:title>
                <h3 class="text-lg font-semibold">Hoş Geldiniz</h3>
            </x-slot>
            <p class="text-gray-600">Laravel Base Project admin paneline hoş geldiniz. Bu dashboard'dan tüm sistem istatistiklerini görüntüleyebilirsiniz.</p>
        </x-card>
    </div>
</div>

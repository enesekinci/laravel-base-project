<div>
    <x-header title="Profil" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Kaydet" wire:click="updateProfile" spinner="updateProfile" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Profil Bilgileri --}}
        <x-card shadow>
            <x-slot:title>
                <h3 class="text-lg font-semibold">Profil Bilgileri</h3>
            </x-slot:title>

            <form wire:submit.prevent="updateProfile">
                <x-input
                    label="Ad Soyad"
                    type="text"
                    wire:model="name"
                    icon="o-user"
                    class="mb-4"
                />

                <x-input
                    label="E-posta"
                    type="email"
                    wire:model="email"
                    icon="o-envelope"
                    class="mb-4"
                />

                <x-input
                    label="Telefon"
                    type="text"
                    wire:model="phone"
                    icon="o-phone"
                    class="mb-4"
                />
            </form>
        </x-card>

        {{-- Şifre Değiştirme --}}
        <x-card shadow>
            <x-slot:title>
                <h3 class="text-lg font-semibold">Şifre Değiştir</h3>
            </x-slot:title>

            <form wire:submit.prevent="updateProfile">
                <x-input
                    label="Mevcut Şifre"
                    type="password"
                    wire:model="current_password"
                    icon="o-lock-closed"
                    class="mb-4"
                />

                <x-input
                    label="Yeni Şifre"
                    type="password"
                    wire:model="password"
                    icon="o-lock-closed"
                    class="mb-4"
                />

                <x-input
                    label="Yeni Şifre Tekrar"
                    type="password"
                    wire:model="password_confirmation"
                    icon="o-lock-closed"
                    class="mb-4"
                />

                <x-button
                    label="Şifreyi Güncelle"
                    wire:click="updateProfile"
                    spinner="updateProfile"
                    class="btn-primary w-full"
                />
            </form>
        </x-card>
    </div>
</div>
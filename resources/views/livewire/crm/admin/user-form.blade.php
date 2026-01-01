<div>
    <x-header :title="$userId ? 'Kullanıcı Düzenle' : 'Yeni Kullanıcı'" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Geri Dön" icon="o-arrow-left" class="btn-ghost" link="{{ route('admin.crm.users.index') }}" />
        </x-slot>
    </x-header>

    <x-card>
        <form wire:submit="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input label="Ad Soyad" wire:model="name" icon="o-user" hint="Kullanıcının tam adı" required />

                <x-input label="E-posta" wire:model="email" type="email" icon="o-envelope" hint="Kullanıcının e-posta adresi" required />

                <x-input label="Telefon" wire:model="phone" icon="o-phone" hint="Kullanıcının telefon numarası (opsiyonel)" />

                <x-toggle label="Admin Yetkisi" wire:model="is_admin" hint="Bu kullanıcıya admin yetkisi verilsin mi?" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <x-input
                    label="Şifre"
                    wire:model="password"
                    type="password"
                    icon="o-lock-closed"
                    :hint="$userId ? 'Şifre değiştirmek istemiyorsanız boş bırakın' : 'Kullanıcının şifresi'"
                    :required="!$userId"
                />

                <x-input label="Şifre Tekrar" wire:model="password_confirmation" type="password" icon="o-lock-closed" :required="!$userId" />
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-button label="İptal" class="btn-ghost" link="{{ route('admin.crm.users.index') }}" />
                <x-button type="submit" label="Kaydet" icon="o-check" class="btn-primary" spinner="save" />
            </div>
        </form>
    </x-card>
</div>

<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-xl">
        <div class="card-body">
            <h2 class="card-title justify-center mb-4">Kayıt Ol</h2>

            <form wire:submit="register">
                <x-input label="Ad Soyad" type="text" wire:model="name" icon="o-user" class="mb-4" />

                <x-input label="E-posta" type="email" wire:model="email" icon="o-envelope" class="mb-4" />

                <x-input label="Telefon (Opsiyonel)" type="text" wire:model="phone" icon="o-phone" class="mb-4" />

                <x-input label="Şifre" type="password" wire:model="password" icon="o-lock-closed" class="mb-4" />

                <x-input label="Şifre Tekrar" type="password" wire:model="password_confirmation" icon="o-lock-closed" class="mb-4" />

                <x-button label="Kayıt Ol" type="submit" class="btn-primary w-full" spinner="register" />
            </form>

            <div class="divider">VEYA</div>

            <div class="text-center">
                <p class="text-sm text-gray-500">
                    Zaten hesabınız var mı?
                    <a href="{{ route('login') }}" class="link link-primary">Giriş Yap</a>
                </p>
            </div>
        </div>
    </div>
</div>

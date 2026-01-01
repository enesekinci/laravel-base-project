<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-xl">
        <div class="card-body">
            <h2 class="card-title justify-center mb-4">Giriş Yap</h2>

            <form wire:submit="login">
                <x-input label="E-posta" type="email" wire:model="email" icon="o-envelope" class="mb-4" />

                <x-input label="Şifre" type="password" wire:model="password" icon="o-lock-closed" class="mb-4" />

                <x-checkbox label="Beni Hatırla" wire:model="remember" class="mb-4" />

                <x-button label="Giriş Yap" type="submit" class="btn-primary w-full" spinner="login" />
            </form>

            <div class="divider">VEYA</div>

            <div class="text-center">
                <a href="{{ route('password.forgot') }}" class="link link-primary">Şifremi Unuttum</a>
            </div>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-500">
                    Hesabınız yok mu?
                    <a href="{{ route('register') }}" class="link link-primary">Kayıt Ol</a>
                </p>
            </div>
        </div>
    </div>
</div>

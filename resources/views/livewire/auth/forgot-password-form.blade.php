<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-xl">
        <div class="card-body">
            <h2 class="card-title justify-center mb-4">Şifremi Unuttum</h2>

            <p class="text-sm text-gray-500 mb-4">E-posta adresinize şifre sıfırlama bağlantısı göndereceğiz.</p>

            <form wire:submit="sendResetLink">
                <x-input label="E-posta" type="email" wire:model="email" icon="o-envelope" class="mb-4" />

                <x-button label="Şifre Sıfırlama Bağlantısı Gönder" type="submit" class="btn-primary w-full" spinner="sendResetLink" />
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="link link-primary">Giriş sayfasına dön</a>
            </div>
        </div>
    </div>
</div>

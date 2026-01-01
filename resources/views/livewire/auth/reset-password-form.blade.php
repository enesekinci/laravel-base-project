<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-xl">
        <div class="card-body">
            <h2 class="card-title justify-center mb-4">Şifre Sıfırla</h2>

            <form wire:submit="resetPassword">
                <x-input label="E-posta" type="email" wire:model="email" icon="o-envelope" class="mb-4" readonly />

                <x-input label="Yeni Şifre" type="password" wire:model="password" icon="o-lock-closed" class="mb-4" />

                <x-input label="Yeni Şifre Tekrar" type="password" wire:model="password_confirmation" icon="o-lock-closed" class="mb-4" />

                <x-button label="Şifreyi Sıfırla" type="submit" class="btn-primary w-full" spinner="resetPassword" />
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="link link-primary">Giriş sayfasına dön</a>
            </div>
        </div>
    </div>
</div>

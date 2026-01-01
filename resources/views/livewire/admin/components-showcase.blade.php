<div>
    <x-header title="MaryUI Components Showcase" separator>
        <x-slot:actions>
            <x-badge value="Tüm Componentler" class="badge-primary" />
        </x-slot>
    </x-header>

    @once
        @push('styles')
            {{-- Third-party libraries CSS --}}
            {{-- Cropper.js --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

            {{-- Sortable.js (no CSS needed) --}}

            {{-- Vanilla Calendar --}}
            <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.css" rel="stylesheet" />

            {{-- Chart.js (no CSS needed) --}}

            {{-- Ace Editor --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/theme/monokai.min.css" />

            {{-- Flatpickr --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

            {{-- diff2html --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/xcode.min.css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/css/diff2html.min.css" />

            {{-- PhotoSwipe --}}
            <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet" />

            {{-- EasyMDE --}}
            <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css" />

            {{-- TinyMCE (cloud based, no CSS link needed) --}}

            {{-- Signature Pad (no CSS needed) --}}
        @endpush
    @endonce

    <div class="space-y-4">
        {{-- Forms Components --}}
        <x-accordion wire:model="accordionGroup">
            <x-collapse name="forms" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">Forms Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Input --}}
                        <div>
                            <h5 class="font-semibold mb-3">Input</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-input label="Temel Input" wire:model="name" placeholder="Adınızı girin" />
                                <x-input label="Icon ile" wire:model="name" icon="o-user" />
                                <x-input label="Clearable" wire:model="name" clearable />
                                <x-input label="Prefix & Suffix" wire:model="name" prefix="www" suffix=".com" />
                                <x-input label="Inline Label" wire:model="name" inline />
                            </div>
                        </div>

                        {{-- Textarea --}}
                        <div>
                            <h5 class="font-semibold mb-3">Textarea</h5>
                            <x-textarea label="Açıklama" wire:model="description" rows="4" />
                        </div>

                        {{-- Select --}}
                        <div>
                            <h5 class="font-semibold mb-3">Select</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-select label="Kullanıcı Seç" wire:model="selectedUser" :options="$users" />
                                <x-select label="Icon ile" wire:model="selectedUser" :options="$users" icon="o-user" />
                            </div>
                        </div>

                        {{-- Checkbox --}}
                        <div>
                            <h5 class="font-semibold mb-3">Checkbox</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-checkbox label="Beni Hatırla" wire:model="remember" />
                                <x-checkbox label="Sağda" wire:model="remember" right />
                            </div>
                        </div>

                        {{-- Toggle --}}
                        <div>
                            <h5 class="font-semibold mb-3">Toggle</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-toggle label="Bildirimleri Etkinleştir" wire:model="enabled" />
                                <x-toggle label="Sağda" wire:model="enabled" right />
                            </div>
                        </div>

                        {{-- Radio --}}
                        <div>
                            <h5 class="font-semibold mb-3">Radio</h5>
                            <x-radio label="Seçenek Seç" wire:model="radioOption" :options="$users" />
                        </div>

                        {{-- Group --}}
                        <div>
                            <h5 class="font-semibold mb-3">Group</h5>
                            <x-group label="Birini Seç" wire:model="groupOption" :options="$users" />
                        </div>

                        {{-- Color Picker --}}
                        <div>
                            <h5 class="font-semibold mb-3">Color Picker</h5>
                            <x-colorpicker wire:model="color" label="Renk Seç" />
                        </div>

                        {{-- Choices --}}
                        <div>
                            <h5 class="font-semibold mb-3">Choices</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-choices label="Tek Seçim" wire:model="choiceUserId" :options="$users" single clearable />
                                <x-choices label="Çoklu Seçim" wire:model="choiceUserIds" :options="$users" clearable />
                            </div>
                        </div>

                        {{-- DateTime --}}
                        <div>
                            <h5 class="font-semibold mb-3">DateTime</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-datetime label="Tarih" wire:model="date" />
                                <x-datetime label="Tarih ve Saat" wire:model="date" type="datetime-local" />
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div>
                            <h5 class="font-semibold mb-3">File Upload</h5>
                            <x-file wire:model="file" label="Dosya Yükle" accept="image/*" />
                        </div>

                        {{-- Image Library --}}
                        <div>
                            <h5 class="font-semibold mb-3">Image Library</h5>
                            <x-image-library wire:model="files" wire:library="library" :preview="$library" label="Ürün Resimleri" hint="Maksimum 5 resim" />
                        </div>

                        {{-- Range Slider --}}
                        <div>
                            <h5 class="font-semibold mb-3">Range Slider</h5>
                            <x-range wire:model.live.debounce="level" label="Seviye Seç" min="0" max="100" step="5" />
                        </div>

                        {{-- Tags --}}
                        <div>
                            <h5 class="font-semibold mb-3">Tags</h5>
                            <x-tags label="Etiketler" wire:model="tags" icon="o-tag" clearable />
                        </div>
                    </div>
                </x-slot>
            </x-collapse>

            {{-- List Data Components --}}
            <x-collapse name="list-data" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">List Data Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Table --}}
                        <div>
                            <h5 class="font-semibold mb-3">Table</h5>
                            <x-table :headers="$tableHeaders" :rows="$tableRows">
                                <x-slot:actions="{ $row }">
                                    <x-button label="Düzenle" icon="o-pencil" class="btn-sm" />
                                </x-slot>
                            </x-table>
                        </div>

                        {{-- List Item --}}
                        <div>
                            <h5 class="font-semibold mb-3">List Item</h5>
                            <div class="space-y-2">
                                @foreach($users as $user)
                                    <x-list-item :item="$user" value="name" sub-value="id" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-collapse>

            {{-- Menus Components --}}
            <x-collapse name="menus" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">Menus Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Menu --}}
                        <div>
                            <h5 class="font-semibold mb-3">Menu</h5>
                            <x-menu>
                                <x-menu-item title="Dashboard" icon="o-home" link="#" />
                                <x-menu-item title="Kullanıcılar" icon="o-users" link="#" />
                                <x-menu-sub title="Ayarlar" icon="o-cog">
                                    <x-menu-item title="Genel" link="#" />
                                    <x-menu-item title="Güvenlik" link="#" />
                                </x-menu-sub>
                            </x-menu>
                        </div>

                        {{-- Dropdown --}}
                        <div>
                            <h5 class="font-semibold mb-3">Dropdown</h5>
                            <x-dropdown label="İşlemler" class="btn-primary">
                                <x-menu-item title="Düzenle" icon="o-pencil" />
                                <x-menu-item title="Sil" icon="o-trash" />
                                <x-menu-item title="Kopyala" icon="o-document-duplicate" />
                            </x-dropdown>
                        </div>
                    </div>
                </x-slot>
            </x-collapse>

            {{-- Dialogs Components --}}
            <x-collapse name="dialogs" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">Dialogs Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Modal --}}
                        <div>
                            <h5 class="font-semibold mb-3">Modal</h5>
                            <div class="flex gap-2">
                                <x-button label="Temel Modal" wire:click="$set('showModal1', true)" />
                                <x-button label="Form Modal" wire:click="$set('showModal2', true)" />
                                <x-button label="Persistent Modal" wire:click="$set('showModal3', true)" />
                            </div>

                            <x-modal wire:model="showModal1" title="Temel Modal">
                                <p>Bu basit bir modal örneğidir.</p>
                                <x-slot:actions>
                                    <x-button label="Kapat" @click="$wire.showModal1 = false" />
                                </x-slot>
                            </x-modal>

                            <x-modal wire:model="showModal2" title="Form Modal">
                                <x-form wire:submit="showToast" no-separator>
                                    <x-input label="Ad" wire:model="name" />
                                    <x-input label="E-posta" wire:model="email" />
                                    <x-slot:actions>
                                        <x-button label="İptal" @click="$wire.showModal2 = false" />
                                        <x-button label="Kaydet" type="submit" class="btn-primary" />
                                    </x-slot>
                                </x-form>
                            </x-modal>

                            <x-modal wire:model="showModal3" title="Persistent Modal" persistent separator>
                                <p>Bu modal dışarı tıklayarak veya ESC ile kapatılamaz.</p>
                                <x-slot:actions>
                                    <x-button label="Kapat" @click="$wire.showModal3 = false" />
                                </x-slot>
                            </x-modal>
                        </div>

                        {{-- Toast --}}
                        <div>
                            <h5 class="font-semibold mb-3">Toast</h5>
                            <div class="flex gap-2">
                                <x-button label="Success" wire:click="showToast" class="btn-success" />
                                <x-button label="Error" wire:click="showErrorToast" class="btn-error" />
                                <x-button label="Warning" wire:click="showWarningToast" class="btn-warning" />
                                <x-button label="Info" wire:click="showInfoToast" class="btn-info" />
                            </div>
                        </div>

                        {{-- Drawer --}}
                        <div>
                            <h5 class="font-semibold mb-3">Drawer</h5>
                            <x-button label="Drawer Aç" wire:click="$set('showDrawer', true)" />
                            <x-drawer wire:model="showDrawer" title="Drawer Örneği" class="drawer-end">
                                <p>Drawer içeriği burada.</p>
                                <x-slot:actions>
                                    <x-button label="Kapat" @click="$wire.showDrawer = false" />
                                </x-slot>
                            </x-drawer>
                        </div>
                    </div>
                </x-slot>
            </x-collapse>

            {{-- UI Components --}}
            <x-collapse name="ui" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">UI Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Alert --}}
                        <div>
                            <h5 class="font-semibold mb-3">Alert</h5>
                            <div class="space-y-2">
                                <x-alert title="Başarılı" description="İşlem başarıyla tamamlandı" icon="o-check-circle" class="alert-success" />
                                <x-alert title="Hata" description="Bir hata oluştu" icon="o-exclamation-triangle" class="alert-error" />
                                <x-alert title="Uyarı" description="Dikkatli olun" icon="o-exclamation-circle" class="alert-warning" />
                            </div>
                        </div>

                        {{-- Avatar --}}
                        <div>
                            <h5 class="font-semibold mb-3">Avatar</h5>
                            <div class="flex gap-4">
                                <x-avatar placeholder="AY" title="Ahmet Yılmaz" />
                                <x-avatar placeholder="FD" title="Fatma Demir" subtitle="fatma@example.com" />
                            </div>
                        </div>

                        {{-- Breadcrumbs --}}
                        <div>
                            <h5 class="font-semibold mb-3">Breadcrumbs</h5>
                            @php
                                $breadcrumbs = [
                                    ['label' => 'Ana Sayfa', 'link' => '#'],
                                    ['label' => 'Kategoriler', 'link' => '#'],
                                    ['label' => 'Mevcut Sayfa'],
                                ];
                            @endphp
                            <x-breadcrumbs :items="$breadcrumbs" />
                        </div>

                        {{-- Button --}}
                        <div>
                            <h5 class="font-semibold mb-3">Button</h5>
                            <div class="flex flex-wrap gap-2">
                                <x-button label="Primary" class="btn-primary" />
                                <x-button label="Success" class="btn-success" />
                                <x-button label="Error" class="btn-error" />
                                <x-button label="Warning" class="btn-warning" />
                                <x-button label="Icon ile" icon="o-heart" class="btn-primary" />
                                <x-button label="Badge ile" badge="5" class="btn-primary" />
                            </div>
                        </div>

                        {{-- Badge --}}
                        <div>
                            <h5 class="font-semibold mb-3">Badge</h5>
                            <div class="flex flex-wrap gap-2">
                                <x-badge value="Primary" class="badge-primary" />
                                <x-badge value="Success" class="badge-success" />
                                <x-badge value="Error" class="badge-error" />
                                <x-badge value="Warning" class="badge-warning" />
                            </div>
                        </div>

                        {{-- Card --}}
                        <div>
                            <h5 class="font-semibold mb-3">Card</h5>
                            <x-card title="Kart Başlığı" subtitle="Kart alt başlığı" shadow separator>
                                <p>Kart içeriği burada.</p>
                                <x-slot:actions>
                                    <x-button label="İşlem" class="btn-primary" />
                                </x-slot>
                            </x-card>
                        </div>

                        {{-- Carousel --}}
                        <div>
                            <h5 class="font-semibold mb-3">Carousel</h5>
                            @php
                                $slides = [
                                    ['image' => '/placeholder-image.png', 'title' => 'Slide 1', 'description' => 'Açıklama 1'],
                                    ['image' => '/placeholder-image.png', 'title' => 'Slide 2', 'description' => 'Açıklama 2'],
                                    ['image' => '/placeholder-image.png', 'title' => 'Slide 3', 'description' => 'Açıklama 3'],
                                ];
                            @endphp
                            <x-carousel :slides="$slides" class="!h-64" />
                        </div>

                        {{-- Collapse --}}
                        <div>
                            <h5 class="font-semibold mb-3">Collapse</h5>
                            <x-collapse wire:model="collapseShow" separator>
                                <x-slot:heading>Collapse Başlığı</x-slot>
                                <x-slot:content>Collapse içeriği burada.</x-slot>
                            </x-collapse>
                        </div>

                        {{-- Header --}}
                        <div>
                            <h5 class="font-semibold mb-3">Header</h5>
                            <x-header title="Sayfa Başlığı" subtitle="Alt başlık" separator />
                        </div>

                        {{-- Icon --}}
                        <div>
                            <h5 class="font-semibold mb-3">Icon</h5>
                            <div class="flex gap-4">
                                <x-icon name="o-home" class="w-6 h-6 text-primary" />
                                <x-icon name="o-user" class="w-6 h-6 text-success" />
                                <x-icon name="o-cog" class="w-6 h-6 text-warning" />
                            </div>
                        </div>

                        {{-- Kbd --}}
                        <div>
                            <h5 class="font-semibold mb-3">Kbd</h5>
                            <div class="flex gap-2">
                                <x-kbd>⌘</x-kbd>
                                <x-kbd>K</x-kbd>
                            </div>
                        </div>

                        {{-- Pin --}}
                        <div>
                            <h5 class="font-semibold mb-3">Pin</h5>
                            <x-pin wire:model="pin" size="4" numeric />
                        </div>

                        {{-- Popover --}}
                        <div>
                            <h5 class="font-semibold mb-3">Popover</h5>
                            <x-popover>
                                <x-slot:trigger>
                                    <x-button label="Popover'ı Aç" class="btn-primary" />
                                </x-slot>
                                <x-slot:content>
                                    <div class="p-2">
                                        <p class="font-semibold">Popover İçeriği</p>
                                        <p class="text-sm">Bu bir popover örneğidir.</p>
                                    </div>
                                </x-slot>
                            </x-popover>
                        </div>

                        {{-- Progress --}}
                        <div>
                            <h5 class="font-semibold mb-3">Progress</h5>
                            <div class="space-y-2">
                                <x-progress value="25" label="25%" />
                                <x-progress value="50" label="50%" class="progress-primary" />
                                <x-progress value="75" label="75%" class="progress-success" />
                            </div>
                        </div>

                        {{-- Rating --}}
                        <div>
                            <h5 class="font-semibold mb-3">Rating</h5>
                            <x-rating wire:model="rating" total="5" />
                        </div>

                        {{-- Spotlight --}}
                        <div>
                            <h5 class="font-semibold mb-3">Spotlight</h5>
                            <p class="text-sm text-gray-600 mb-2">Spotlight component'i layout'ta tanımlıdır. Kısayol tuşu ile açılır (varsayılan: Cmd/Ctrl + K).</p>
                            <x-button label="Spotlight Aç" @click="$dispatch('mary-search-open')" class="btn-primary" />
                        </div>

                        {{-- Statistic --}}
                        <div>
                            <h5 class="font-semibold mb-3">Statistic</h5>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <x-stat title="Mesajlar" value="44" icon="o-envelope" />
                                <x-stat title="Satışlar" value="22.124" icon="o-arrow-trending-up" description="Bu ay" />
                                <x-stat title="Kayıp" value="34" icon="o-arrow-trending-down" description="Bu ay" />
                            </div>
                        </div>

                        {{-- Steps --}}
                        <div>
                            <h5 class="font-semibold mb-3">Steps</h5>
                            <x-steps wire:model="step">
                                <x-step step="1" text="Kayıt">Kayıt adımı</x-step>
                                <x-step step="2" text="Ödeme">Ödeme adımı</x-step>
                                <x-step step="3" text="Tamamlandı">Tamamlandı</x-step>
                            </x-steps>
                            <div class="flex gap-2 mt-4">
                                <x-button label="Önceki" wire:click="prevStep" />
                                <x-button label="Sonraki" wire:click="nextStep" />
                            </div>
                        </div>

                        {{-- Swap --}}
                        <div>
                            <h5 class="font-semibold mb-3">Swap</h5>
                            <x-swap wire:model="swap" />
                        </div>

                        {{-- Timeline --}}
                        <div>
                            <h5 class="font-semibold mb-3">Timeline</h5>
                            <x-timeline-item title="Sipariş Verildi" first icon="o-map-pin" />
                            <x-timeline-item title="Ödeme Onaylandı" icon="o-credit-card" />
                            <x-timeline-item title="Kargoya Verildi" icon="o-paper-airplane" />
                            <x-timeline-item title="Teslim Edildi" last icon="o-gift" />
                        </div>

                        {{-- Tabs --}}
                        <div>
                            <h5 class="font-semibold mb-3">Tabs</h5>
                            <x-tabs wire:model="selectedTab">
                                <x-tab name="users-tab" label="Kullanıcılar" icon="o-users">
                                    <div>Kullanıcılar içeriği</div>
                                </x-tab>
                                <x-tab name="posts-tab" label="Yazılar" icon="o-document">
                                    <div>Yazılar içeriği</div>
                                </x-tab>
                                <x-tab name="settings-tab" label="Ayarlar" icon="o-cog">
                                    <div>Ayarlar içeriği</div>
                                </x-tab>
                            </x-tabs>
                        </div>

                        {{-- Theme Toggle --}}
                        <div>
                            <h5 class="font-semibold mb-3">Theme Toggle</h5>
                            <x-theme-toggle />
                        </div>
                    </div>
                </x-slot>
            </x-collapse>

            {{-- Third-party Components --}}
            <x-collapse name="third-party" separator>
                <x-slot:heading>
                    <span class="text-lg font-semibold">Third-party Components</span>
                </x-slot>
                <x-slot:content>
                    <div class="space-y-6 p-4">
                        {{-- Calendar --}}
                        <div>
                            <h5 class="font-semibold mb-3">Calendar</h5>
                            @php
                                $events = [
                                    [
                                        'label' => 'Etkinlik',
                                        'description' => 'Açıklama',
                                        'css' => '!bg-blue-200',
                                        'date' => now()->addDays(3),
                                    ],
                                ];
                            @endphp
                            <x-calendar :events="$events" />
                        </div>

                        {{-- Chart --}}
                        <div>
                            <h5 class="font-semibold mb-3">Chart</h5>
                            <x-button label="Rastgele" wire:click="randomizeChart" class="btn-primary mb-4" />
                            <x-chart wire:model="chartData" />
                        </div>

                        {{-- Code --}}
                        <div>
                            <h5 class="font-semibold mb-3">Code Editor</h5>
                            <x-code wire:model="code" label="Kod Editörü" language="javascript" />
                        </div>

                        {{-- Date Picker --}}
                        <div>
                            <h5 class="font-semibold mb-3">Date Picker</h5>
                            @php
                                $dateConfig = ['altFormat' => 'd/m/Y'];
                            @endphp
                            <x-datepicker label="Tarih Seç" wire:model="date" icon="o-calendar" :config="$dateConfig" />
                        </div>

                        {{-- Diff --}}
                        <div>
                            <h5 class="font-semibold mb-3">Diff</h5>
                            @php
                                $old = '{"age": 24, "name": "Ahmet"}';
                                $new = '{"age": 27, "name": "Mehmet"}';
                            @endphp
                            <x-diff :old="$old" :new="$new" file-name="example.json" />
                        </div>

                        {{-- Image Gallery --}}
                        <div>
                            <h5 class="font-semibold mb-3">Image Gallery</h5>
                            @php
                                $images = [
                                    '/placeholder-image.png',
                                    '/placeholder-image.png',
                                    '/placeholder-image.png',
                                ];
                            @endphp
                            <x-image-gallery :images="$images" class="h-40 rounded-box" />
                        </div>

                        {{-- Markdown Editor --}}
                        <div>
                            <h5 class="font-semibold mb-3">Markdown Editor</h5>
                            <x-markdown wire:model="markdown" label="Markdown İçerik" />
                        </div>

                        {{-- Rich Text Editor --}}
                        <div>
                            <h5 class="font-semibold mb-3">Rich Text Editor</h5>
                            <x-editor wire:model="editor" label="Zengin Metin Editörü" />
                        </div>

                        {{-- Signature --}}
                        <div>
                            <h5 class="font-semibold mb-3">Signature</h5>
                            <x-signature wire:model="signature" hint="Lütfen imzalayın" />
                        </div>
                    </div>
                </x-slot>
            </x-collapse>
        </x-accordion>
    </div>

    @once
        @push('scripts')
            {{-- Third-party libraries JS --}}
            {{-- Cropper.js --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

            {{-- Sortable.js --}}
            <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>

            {{-- Vanilla Calendar --}}
            <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>

            {{-- Chart.js --}}
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

            {{-- Ace Editor --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ace.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ext-language_tools.min.js"></script>

            {{-- Flatpickr --}}
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

            {{-- diff2html --}}
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/js/diff2html-ui.min.js"></script>

            {{-- PhotoSwipe --}}
            <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>

            {{-- EasyMDE --}}
            <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

            {{-- TinyMCE --}}
            {{-- Note: Requires API key, using CDN --}}
            {{-- <script src="https://cdn.tiny.cloud/1/YOUR-KEY-HERE/tinymce/6/tinymce.min.js"></script> --}}

            {{-- Signature Pad --}}
            <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.2.0/dist/signature_pad.umd.min.js"></script>
        @endpush
    @endonce
</div>


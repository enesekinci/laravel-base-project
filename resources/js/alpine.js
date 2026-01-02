// Alpine.js store'ları
// Livewire 3 Alpine.js'i otomatik olarak yüklüyor, bu yüzden sadece store'ları ekliyoruz
// Store'lar Livewire yüklendikten sonra eklenmeli

function initAlpineStores() {
    // Livewire'ın Alpine instance'ını kullan
    const Alpine = window.Livewire?.Alpine || window.Alpine;

    if (!Alpine) {
        console.warn('Alpine.js bulunamadı, store\'lar eklenemedi');
        return;
    }

    // Toast store
    Alpine.store('toast', {
        messages: [],

        show(message, type = 'info') {
            const id = Date.now();
            this.messages.push({ id, message, type });

            setTimeout(() => {
                this.remove(id);
            }, 5000);
        },

        remove(id) {
            this.messages = this.messages.filter(m => m.id !== id);
        },

        success(message) {
            this.show(message, 'success');
        },

        error(message) {
            this.show(message, 'error');
        },

        info(message) {
            this.show(message, 'info');
        },

        warning(message) {
            this.show(message, 'warning');
        }
    });

    // Modal store
    Alpine.store('modal', {
        open: false,
        title: '',
        content: '',
        component: null,
        props: {},

        show(title, content, component = null, props = {}) {
            this.title = title;
            this.content = content;
            this.component = component;
            this.props = props;
            this.open = true;
        },

        hide() {
            this.open = false;
            this.title = '';
            this.content = '';
            this.component = null;
            this.props = {};
        }
    });

    // Confirm dialog store
    Alpine.store('confirm', {
        open: false,
        title: '',
        message: '',
        onConfirm: null,
        onCancel: null,

        show(title, message, onConfirm, onCancel = null) {
            this.title = title;
            this.message = message;
            this.onConfirm = onConfirm;
            this.onCancel = onCancel;
            this.open = true;
        },

        hide() {
            this.open = false;
            this.title = '';
            this.message = '';
            this.onConfirm = null;
            this.onCancel = null;
        },

        confirm() {
            if (this.onConfirm) {
                this.onConfirm();
            }
            this.hide();
        },

        cancel() {
            if (this.onCancel) {
                this.onCancel();
            }
            this.hide();
        }
    });

    // Theme store
    Alpine.store('theme', {
        current: localStorage.getItem('theme') || 'light',

        init() {
            // Sayfa yüklendiğinde temayı uygula
            const savedTheme = localStorage.getItem('theme') || 'light';
            this.current = savedTheme;
            this.apply(savedTheme);

            // Theme değişikliğini dinle
            window.addEventListener('theme-changed', () => {
                this.updateTinyMCE();
            });
        },

        toggle() {
            this.current = this.current === 'light' ? 'dark' : 'light';
            this.apply(this.current);
            localStorage.setItem('theme', this.current);
            // Force re-render to update all components
            window.dispatchEvent(new Event('theme-changed'));
        },

        apply(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            document.body.setAttribute('data-theme', theme);

            // TinyMCE için class attribute'unu da ekle/kaldır
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            this.current = theme;

            // TinyMCE editörlerini güncelle
            this.updateTinyMCE();
        },

        updateTinyMCE() {
            // TinyMCE editörlerini dark mode'a göre güncelle
            if (window.tinymce && window.tinymce.editors) {
                const isDark = this.current === 'dark';
                window.tinymce.editors.forEach(editor => {
                    if (editor && !editor.isHidden()) {
                        // İçeriği kaydet
                        const content = editor.getContent();
                        const targetId = editor.id;

                        // Skin ve content_css'i güncelle
                        editor.settings.skin = isDark ? 'oxide-dark' : 'oxide';
                        editor.settings.content_css = isDark ? 'dark' : 'default';

                        // Editörü yeniden başlat
                        editor.remove();

                        // Kısa bir gecikme ile yeniden başlat (DOM'un güncellenmesi için)
                        setTimeout(() => {
                            if (document.getElementById(targetId)) {
                                window.tinymce.init({
                                    target: targetId,
                                    ...editor.settings,
                                    setup: function (ed) {
                                        // İçeriği geri yükle
                                        ed.on('init', () => {
                                            ed.setContent(content);
                                        });

                                        // Orijinal setup fonksiyonunu çağır
                                        if (editor.settings.setup) {
                                            editor.settings.setup(ed);
                                        }
                                    }
                                });
                            }
                        }, 100);
                    }
                });
            }
        }
    });
}

// Livewire yüklendikten sonra store'ları ekle
if (window.Livewire) {
    // Livewire zaten yüklü, store'ları ekle
    initAlpineStores();
} else {
    // Livewire henüz yüklenmedi, yüklendiğinde store'ları ekle
    document.addEventListener('livewire:init', () => {
        initAlpineStores();
    });

    // Fallback: Eğer Livewire yoksa ve Alpine varsa (standalone kullanım için)
    if (window.Alpine && !window.Livewire) {
        initAlpineStores();
    }
}


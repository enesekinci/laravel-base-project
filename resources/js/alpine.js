import Alpine from 'alpinejs';

// Alpine.js global store
window.Alpine = Alpine;

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

Alpine.start();


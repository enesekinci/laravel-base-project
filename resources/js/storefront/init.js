import axios from 'axios';

// CSRF token setup
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

// Base URL
axios.defaults.baseURL = '/api';

// Auth token setup (localStorage'dan)
const authToken = localStorage.getItem('auth_token');
if (authToken) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${authToken}`;
}

// Request interceptor
axios.interceptors.request.use(
    (config) => {
        // Auth token'ı her istekte güncelle
        const token = localStorage.getItem('auth_token');
        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Response interceptor
axios.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        if (error.response) {
            const status = error.response.status;
            const data = error.response.data;

            // 401 Unauthorized - login sayfasına yönlendir
            if (status === 401) {
                const currentPath = window.location.pathname;
                if (!currentPath.includes('/login') && !currentPath.includes('/register')) {
                    window.location.href = `/login?redirect=${encodeURIComponent(currentPath)}`;
                }
            }

            // 422 Validation errors
            if (status === 422 && data.errors) {
                const errors = Object.values(data.errors).flat();
                if (window.Alpine && window.Alpine.store('toast')) {
                    errors.forEach(err => {
                        window.Alpine.store('toast').error(err);
                    });
                }
            }

            // 500 Server error
            if (status >= 500) {
                if (window.Alpine && window.Alpine.store('toast')) {
                    window.Alpine.store('toast').error(data.message || 'Bir hata oluştu');
                }
            }
        }

        return Promise.reject(error);
    }
);

// Global axios instance
window.storefrontApi = axios;

// Helper functions
window.storefrontApiHelpers = {
    async get(url, params = {}) {
        try {
            const response = await axios.get(url, { params });
            return response.data;
        } catch (error) {
            throw error;
        }
    },

    async post(url, data = {}) {
        try {
            const response = await axios.post(url, data);
            return response.data;
        } catch (error) {
            throw error;
        }
    },

    async put(url, data = {}) {
        try {
            const response = await axios.put(url, data);
            return response.data;
        } catch (error) {
            throw error;
        }
    },

    async delete(url) {
        try {
            const response = await axios.delete(url);
            return response.data;
        } catch (error) {
            throw error;
        }
    }
};

// Auth helpers
window.authHelpers = {
    setToken(token) {
        localStorage.setItem('auth_token', token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    },

    removeToken() {
        localStorage.removeItem('auth_token');
        delete axios.defaults.headers.common['Authorization'];
    },

    getToken() {
        return localStorage.getItem('auth_token');
    },

    isAuthenticated() {
        return !!localStorage.getItem('auth_token');
    }
};


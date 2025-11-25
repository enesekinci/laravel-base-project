import axios from 'axios';

// CSRF token setup
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

// Base URL
axios.defaults.baseURL = '/api/admin';

// Session cookie'lerin gönderilmesi için withCredentials: true
axios.defaults.withCredentials = true;

// Request interceptor
axios.interceptors.request.use(
    (config) => {
        config.headers['Accept'] = 'application/json';
        config.withCredentials = true;
        return config;
    },
    (error) => Promise.reject(error)
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

            // 401 Unauthorized - logout
            if (status === 401) {
                window.location.href = '/login';
            }

            // 422 Validation errors
            if (status === 422 && data.errors) {
                const errorMessages = [];
                Object.keys(data.errors).forEach((field) => {
                    const fieldErrors = data.errors[field];
                    if (Array.isArray(fieldErrors) && fieldErrors.length > 0) {
                        fieldErrors.forEach((errorMsg) => {
                            if (errorMsg && typeof errorMsg === 'string' && errorMsg.trim().length > 0) {
                                errorMessages.push(errorMsg.trim());
                            }
                        });
                    }
                });

                if (errorMessages.length > 0 && window.swalHelpers) {
                    window.swalHelpers.error(errorMessages.join('<br>'));
                }
            }

            // 500 Server error
            if (status >= 500 && window.swalHelpers) {
                window.swalHelpers.error(data.message || 'Bir hata oluştu');
            }
        }

        return Promise.reject(error);
    }
);

// Global axios instance
window.adminApi = axios;

// Helper functions - Immediately available
window.adminApiHelpers = {
    async get(url, params = {}) {
        const response = await axios.get(url, { params, withCredentials: true });
        return response.data;
    },

    async post(url, data = {}) {
        const response = await axios.post(url, data, { withCredentials: true });
        return response.data;
    },

    async put(url, data = {}) {
        const response = await axios.put(url, data, { withCredentials: true });
        return response.data;
    },

    async delete(url) {
        const response = await axios.delete(url, { withCredentials: true });
        return response.data;
    }
};

// Mark as loaded
window.adminApiHelpersLoaded = true;


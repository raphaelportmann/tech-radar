import axios, { AxiosInstance, AxiosRequestConfig } from 'axios';
import jwtDecode from 'jwt-decode';

class AuthService {
  private static axios: AxiosInstance = axios.create({
    baseURL: process.env.VUE_APP_BACKEND_URL + '/auth',
    timeout: 2000,
  });
  async login(email: string, password: string) {
    return AuthService.axios
      .post('login', {
        email: email,
        password: password
      })
      .then(response => {
        if (response.data.token) {
          localStorage.setItem('token', response.data.token);
          window.dispatchEvent(new CustomEvent('auth-updated'));
        }
      });
  }
  async logout() {
    return AuthService.axios
      .post('logout')
      .finally(() => {
        localStorage.removeItem('token');
        window.location.href = '/login';
      });
  }
  isAuthenticated() {
    const token = localStorage.getItem('token');
    return Boolean(token);
  }
  isExpired() {
    const token = localStorage.getItem('token');
    if (token) {
      const decoded: any = jwtDecode(token);
      return decoded.exp < Date.now() / 1000;
    }
    return true;
  }
  getRole() {
    const token = localStorage.getItem('token');
    if (token) {
      try {
        const decodedToken: any = jwtDecode(token);
        return decodedToken.role;
      } catch {
        return false;
      }
    }
    return false;
  }
  addAuth(axios: AxiosInstance) {
    axios.interceptors.request.use(function (config: AxiosRequestConfig) {
      const token = localStorage.getItem('token');
      if (token) {
          (config.headers ??= {}).Authorization = 'Bearer ' + token;
      }
      return config;
    });
    axios.interceptors.response.use(response => {
      return response;
    }, error => {
      if (error.response && error.response.status === 401) {
        localStorage.removeItem('token');
        window.location.href = '/login';
      }
      return Promise.reject(error);
    });
  }
}
export default new AuthService();
import Technology from '@/types/Technology';
import axios, { AxiosInstance } from 'axios';
import authService from '@/services/auth.service';

class ApiService {
    private static axios: AxiosInstance = axios.create({
        baseURL: process.env.VUE_APP_BACKEND_URL + '/api',
        timeout: 2000,
    });
    constructor() {
        authService.addAuth(ApiService.axios);
    }
    technologies(all = false) {
        return ApiService.axios.get('technologies' + (all ? '?all' : ''));
    }
    technology(id: number) {
        return ApiService.axios.get('technologies/' + id);
    }
    saveTechnology(technology: Technology) {
        const data: any = { ...technology };
        Object.keys(data).forEach(key => data[key] === null && delete data[key]);

        if (technology.id) {
            return ApiService.axios.put('technologies/' + technology.id, data);
        } else {
            return ApiService.axios.post('technologies', data);
        }
    }
    deleteTechnology(id: number) {
        return ApiService.axios.delete('technologies/' + id);
    }
    types() {
        return ApiService.axios.get('types');
    }
    states() {
        return ApiService.axios.get('states');
    }
}
export default new ApiService();
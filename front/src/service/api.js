import axios from axios

export const api = axios.create({
    baseURL: 'http://localhost:8000/back/index.php',
    timeout: 1000,
    headers: {'Content-Type': 'application/json', 'Accept': 'application/json'}
});

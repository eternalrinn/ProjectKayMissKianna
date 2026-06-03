import './bootstrap';
import * as bootstrap from 'bootstrap';

document.querySelectorAll('.app-toast').forEach((item) => {
    const toast = new bootstrap.Toast(item);
    toast.show();
});

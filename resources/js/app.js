// import './bootstrap';
// import 'bootstrap';
console.log("APP.JS CARGADO");
// import 'bootstrap/dist/css/bootstrap.min.css'; 
// import 'bootstrap';
import Swal from 'sweetalert2';
window.Swal = Swal;
import './delete-confirm';

import Alpine from 'alpinejs';
import clientSelector from './selclientes.js';

window.Alpine = Alpine;
Alpine.data('clientSelector', clientSelector);
Alpine.start();




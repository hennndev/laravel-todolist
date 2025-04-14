import './bootstrap';
import { Notyf } from 'notyf'
import 'notyf/notyf.min.css'
import Alpine from 'alpinejs';


window.toast = new Notyf();

window.Alpine = Alpine;
Alpine.start();



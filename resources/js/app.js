require('./bootstrap');
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

import './glightbox.min';
import './main';
import './tiny-slider';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

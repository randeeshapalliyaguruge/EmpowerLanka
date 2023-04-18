import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import mask from '@alpinejs/mask'

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.plugin(focus);

Alpine.start();

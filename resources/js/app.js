import './bootstrap';

import Alpine from 'alpinejs';

import autoAnimate from '@formkit/auto-animate';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('cards-wrapper')
    if (container) {
        autoAnimate(container, {duration: 700})
    }
})

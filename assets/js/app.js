//import './foundation.js'
import './vendors/sniff.min.js'
import '@/assets/sass/app.scss'

// Open and Close Menu
let menu = document.querySelector('[data-menu]');
if(menu) {
  menu.addEventListener('click',(e) => {
    e.preventDefault();
    document.body.classList.toggle('menu-open');
  })
}

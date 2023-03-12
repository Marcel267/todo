// import { Controller } from '@hotwired/stimulus';
// import '@kanety/stimulus-contextmenu';


// export default class extends Controller {
//     static targets = ['menu', 'context'];
//     static actions = [
//         ['element', 'contextmenu->show'],
//         ['element', 'click@window->hide']
//     ];


//     show(e) {
//         if (this.hasContextTarget && !this.contextTarget.contains(e.target)) return;

//         this.menuTarget.style.top = `${e.pageY + 1}px`;
//         this.menuTarget.style.left = `${e.pageX + 1}px`;
//         this.toggleClass(true);
//         e.preventDefault();
//     }

//     hide(e) {
//         this.toggleClass(false);
//     }

//     toggleClass(visible) {
//         if (visible) {
//             this.menuTarget.style.display = 'block';
//         } else {
//             this.menuTarget.style.display = 'hidden';
//         }
//     }
// }

// For Auto-collapsing nav
let nav = document.querySelector('nav');
let offsetY = 100;
window.addEventListener('scroll', (e) => {
  if (window.pageYOffset > offsetY) {
    nav.classList.remove('active')
  } else {
    nav.classList.add('active')
  }
  offsetY = window.pageYOffset > 100 ? window.pageYOffset : 100
})


//For side-nav toggle
let asideMenu = document.querySelector('aside')

let toggler = document.querySelector('nav>i')
toggler.addEventListener('click', (e) => {
  updateUi()
})

let togglerMenuItem = document.querySelector('aside > ul > li > i.fa-times')
togglerMenuItem.addEventListener('click', (e) => {
  updateUi()
})

let overlay = document.querySelector('div.overlay');
overlay.addEventListener('click', () => {
  updateUi()
})

const updateUi = () => {
  asideMenu.classList.toggle('hide-aside')
  overlay.classList.toggle('hide-overlay')
}
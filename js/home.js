const hamburger = document.querySelector('.burger')
const navigation = document.querySelector('.navigation')
const header = document.querySelector('.header')
const menu = document.querySelector('.navigation__menu')

const changeNavColor = () => {
  window.scrollY > header.scrollHeight ? navigation.style.backgroundColor = '#3A4750' : navigation.style.backgroundColor = 'transparent';
}

const toggleMobileMenu = () => {
  hamburger.classList.toggle('burger--active')
  menu.classList.toggle('menu--active')
}

hamburger.addEventListener('click', toggleMobileMenu)

window.addEventListener('scroll', changeNavColor)
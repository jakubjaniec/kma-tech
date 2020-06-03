const hamburger = document.querySelector('.burger')
const navigation = document.querySelector('.navigation')
const productsSection = document.querySelector('.products')
const header = document.querySelector('.header')
const menu = document.querySelector('.navigation__menu')
const carouselBtn = document.querySelector('.carousel-btn-left')

new Glider(document.querySelector('.glider1'), {
  itemWidth: 250,
  slidesToShow: 0,
  slidesToScroll: 1,
  arrows: {
    next: '.carousel1 .carousel-btn-right',
    prev: '.carousel1 .carousel-btn-left'
  },
  draggable: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5
      }
    }
  ]
})

new Glider(document.querySelector('.glider2'), {
  itemWidth: 250,
  slidesToShow: 0,
  slidesToScroll: 1,
  arrows: {
    next: '.carousel2 .carousel-btn-right',
    prev: '.carousel2 .carousel-btn-left'
  },
  draggable: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5
      }
    }
  ]
})

new Glider(document.querySelector('.glider3'), {
  itemWidth: 250,
  slidesToShow: 0,
  slidesToScroll: 1,
  arrows: {
    next: '.carousel3 .carousel-btn-right',
    prev: '.carousel3 .carousel-btn-left'
  },
  draggable: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5
      }
    }
  ]
})

const changeNavColor = () => {
  window.scrollY >= header.scrollHeight - 200 ? navigation.style.backgroundColor = '#3A4750' : navigation.style.backgroundColor = 'transparent'
}

const toggleMobileMenu = () => {
  hamburger.classList.toggle('burger--active')
  menu.classList.toggle('menu--active')
}

hamburger.addEventListener('click', toggleMobileMenu)

window.addEventListener('scroll', changeNavColor)
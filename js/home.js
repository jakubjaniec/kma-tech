const hamburger = document.querySelector('.burger')
const navigation = document.querySelector('.navigation')

// scroll to section

document.querySelector('.home-li').addEventListener('click', () => window.scrollTo(0, document.querySelector('.header').offsetTop))

document.querySelector('.section1-li').addEventListener('click', () => window.scrollTo(0, document.querySelector('.carousel1').offsetTop - navigation.clientHeight))

document.querySelector('.section2-li').addEventListener('click', () => window.scrollTo(0, document.querySelector('.carousel2').offsetTop - navigation.clientHeight))

document.querySelector('.section3-li').addEventListener('click', () => window.scrollTo(0, document.querySelector('.carousel3').offsetTop - navigation.clientHeight))

document.querySelector('.contact-li').addEventListener('click', () => window.scrollTo(0, document.querySelector('.footer').offsetTop))


// products' carousel

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
  window.scrollY >= document.querySelector('.header').scrollHeight - 200 ? navigation.style.backgroundColor = '#3A4750' : navigation.style.backgroundColor = 'transparent'
}

const toggleMobileMenu = () => {
  hamburger.classList.toggle('burger--active')
  document.querySelector('.navigation__menu').classList.toggle('menu--active')
}

hamburger.addEventListener('click', toggleMobileMenu)

window.addEventListener('scroll', changeNavColor)
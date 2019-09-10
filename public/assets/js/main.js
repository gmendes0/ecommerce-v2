window.onload = () => {

  const isOnTop = (defaulttop) => window.pageYOffset < defaulttop

  const navbar = document.querySelector('.navbar')
  const myDefaultTop = 100
  const myNavbarPadding = 'p-3'
  const myNavbarStartPadding = 'p-4'
  const startNavbarShadow = 'shadow-sm'
  const myNavbarShadow = 'shadow-lg'

  const ajustarNavbar = () => {

    if (navbar.classList.contains(myNavbarStartPadding)) {

      if (!isOnTop(myDefaultTop + myDefaultTop * 0.15)) {
  
        navbar.classList.remove(myNavbarStartPadding)
        navbar.classList.remove(startNavbarShadow)
        navbar.style.transition = '.5s'
        navbar.classList.add(myNavbarPadding)
        navbar.classList.add(myNavbarShadow)
      }
    } else if (navbar.classList.contains(myNavbarPadding)) {

      if (isOnTop(myDefaultTop)) {

        navbar.classList.remove(myNavbarPadding)
        navbar.classList.remove(myNavbarShadow)
        navbar.style.transition = '.7s'
        navbar.classList.add(myNavbarStartPadding)
        navbar.classList.add(startNavbarShadow)
      }
    }
  }

  ajustarNavbar()

  document.addEventListener('scroll', ajustarNavbar)
  
  document.querySelectorAll('.moeda').forEach((element, i) => {
    
    element.innerHTML = Number(element.innerHTML)
    .toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})
  })
}
window.onload = () => {

  const isOnTop = (defaulttop) => window.pageYOffset < defaulttop

  const navbar = document.querySelector('.navbar')
  const myDefaultTop = 100
  const myNavbarPadding = 'p-3'
  const myNavbarStartPadding = 'p-4'

  const ajustarNavbar = () => {

    if (navbar.classList.contains(myNavbarStartPadding)) {

      if (!isOnTop(myDefaultTop + myDefaultTop * 0.15)) {
  
        navbar.classList.remove(myNavbarStartPadding)
        navbar.style.transition = '.7s'
        navbar.classList.add(myNavbarPadding)
      }
    } else if (navbar.classList.contains(myNavbarPadding)) {

      if (isOnTop(myDefaultTop)) {

        navbar.classList.remove(myNavbarPadding)
        navbar.style.transition = '.7s'
        navbar.classList.add(myNavbarStartPadding)
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
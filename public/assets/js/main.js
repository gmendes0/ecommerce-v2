document.querySelectorAll('.moeda').forEach((element, i) => {

  element.innerHTML = Number(element.innerHTML)
    .toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})
})
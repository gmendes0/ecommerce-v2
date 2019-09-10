window.onload = () => {

  const arquivosContainer = document.querySelector('#arquivos')
  
  // document.querySelector('#btnAddMore').addEventListener('click', () => {
    
  //   event.preventDefault()

  //   const input = document.createElement('input')
  //   const card = document.createElement('div')
  //   const row = document.createElement('div')
  //   const col = document.createElement('col')

  //   row.classList = 'row justify-content-center'
  //   col.classList = 'col-12 col-sm-10 my-2'
  //   card.classList = 'card p-2'

  //   input.setAttribute('name', 'photo')
  //   input.setAttribute('type', 'file')
  //   input.setAttribute('id', 'photo')
  //   input.classList = 'form-control-file photo-upload'

  //   card.appendChild(input)
  //   col.appendChild(card)
  //   row.appendChild(col)
  //   arquivosContainer.appendChild(row)
  // })

  document.querySelector('#enviar').addEventListener('click', () => {

    event.preventDefault()

    const arquivos = document.querySelectorAll('.photo-upload')
    const url = arquivosContainer.getAttribute('data-url')
    const formdata = new FormData(document.querySelector('form'))

    arquivos.forEach((element, i) => {

      const salvar = async() => {

        const res = await fetch(url, {method: 'POST', mode: 'same-origin', body: formdata})
          .then((response) => {

            if(response.ok && response.status === 200){

              return response.json()
            }
          })
          .then(json => window.alert(json))
        console.log(res)
      }

      salvar()
    })
  })
}
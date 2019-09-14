window.onload = () => {

  const loadingSpinner = document.querySelector('#loading-spinner')

  const myAlert = {

    error_area: document.querySelector('#error_area'),
    error_text: document.querySelector('.alert-danger'),
    success_area: document.querySelector('#success_area'),
    success_text: document.querySelector('.alert-success'),

    addStyleDisplayNone(){

      this.error_area.setAttribute('style', 'display: none')
      this.success_area.setAttribute('style', 'display: none')
    },

    removeStyle(element){

      element.removeAttribute('style')
    },

    unsetAlertMessage(type){

      type.innerHTML = ''
    },

    setAlertMessage(message){

      this.error_text.innerHTML = message
    },

    setSuccessMessage(message){

      this.success_text.innerHTML = message
    },

    dumpError(message){
      this.unsetAlertMessage(this.error_text)
      this.setAlertMessage(message)
      this.removeStyle(this.error_area)
    },

    dumpSuccess(message){

      this.unsetAlertMessage(this.success_text)
      this.setSuccessMessage(message)
      this.removeStyle(this.success_area)
    }
  }

  const arquivosContainer = document.querySelector('#arquivos')

  document.querySelector('#enviar').addEventListener('click', () => {

    event.preventDefault()
    myAlert.addStyleDisplayNone()

    const arquivos = document.querySelectorAll('#photo')
    const url = arquivosContainer.getAttribute('data-url')
    const formdata = new FormData(document.querySelector('#photo-form'))

    const enviar = async() => {

      loadingSpinner.removeAttribute('style')
      const upload = await fetch(url, {method: 'POST', mode: 'same-origin', body: formdata})
        .then(response => {
          
          if(response.ok){

            try {
              
              return response.json()
            } catch (error) {
              
              console.error(error)
            }
          }
        })
        .then(json => {

          if(json){

            if(json.data.error){
              
              myAlert.dumpError(`erro: ${json.data.error.message}`)
            }else{

              myAlert.dumpSuccess(`Operação realizada com sucesso`)
            }
            console.log(json)
          }
        })
        .catch((error) => {

          myAlert.dumpError('Erro ao enviar')
        })
        .finally(() => {

          loadingSpinner.setAttribute('style', 'display: none')
        })
    }

    enviar()
  })
}
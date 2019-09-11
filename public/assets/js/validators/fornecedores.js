window.onload = () => {

  const validFeedbackClass = 'valid-feedback'
  const invalidFeedbackClass = 'invalid-feedback'
  const isValidClass = 'is-valid'
  const isInvalidClass = 'is-invalid'

  const empty = input => input.length === 0

  const resetInput = (input, remove, newclass = null) => {

    if(input.classList.contains(remove)){

      input.classList.remove(remove)
    }

    if(newclass !== null && newclass.length > 0){

      input.classList.add(newclass)
    }
  }

  const resetHtml = (element, newMessage = null) => {

    element.innerHTML = ''

    if(newMessage !== null && newMessage.length > 0){

      element.innerHTML = newMessage
    }
  }

  const changeFeedback = (feedbackElement, oldClass, newClass, message = null) => {

    if(feedbackElement.classList.contains(oldClass)){

      feedbackElement.classList.remove(oldClass)
    }
    
    resetHtml(feedbackElement, message)
    feedbackElement.classList.add(newClass)
  }

  const validateRequiredStatus = (input, feedbackElement = null, invalidMessage = null, validMessage = null) => {

    if(empty(input.value)){

      resetInput(input, 'is-valid', 'is-invalid')

      if(feedbackElement !== null && invalidMessage !== null){

        changeFeedback(feedbackElement, 'valid-feedback', 'invalid-feedback', invalidMessage)
      }
      return false
    }else{
      
      changeFeedback(feedbackElement, 'invalid-feedback', 'valid-feedback', validMessage)
      resetInput(input, 'is-invalid', 'is-valid')
      return true
    }
  }

  const validateLength = (input, feedbackElement = null, invalidMessage = [null, null], validMessage = null, max, min = 0) => {

    if(input.value.length < min){

      changeFeedback(feedbackElement, validFeedbackClass, invalidFeedbackClass, invalidMessage[0])
      resetInput(input, isValidClass, isInvalidClass)
      return false
    }else if(input.value.length > max){

      changeFeedback(feedbackElement, validFeedbackClass, invalidFeedbackClass, invalidMessage[1])
      resetInput(input, isValidClass, isInvalidClass)
      return false
    }else{

      changeFeedback(feedbackElement, invalidFeedbackClass, validFeedbackClass, validMessage)
      resetInput(input, isInvalidClass, isValidClass)
      return true
    }
  }

  const isNumeric = (input, feedbackElement = null, invalidMessage = null, validMessage = null) => {

    if(Number(input.value) === NaN || !Number(input.value)){

      changeFeedback(feedbackElement, validFeedbackClass, invalidFeedbackClass, invalidMessage)
      resetInput(input, isValidClass, isInvalidClass)
      return false
    }else{
      
      changeFeedback(feedbackElement, invalidFeedbackClass, validFeedbackClass, validMessage)
      resetInput(input, isInvalidClass, isValidClass)
      return true
    }
  }

  document.querySelector('#btnSubmit').addEventListener('click', () => {

    event.preventDefault()

    const nome = document.querySelector('#nome')
    const email = document.querySelector('#email')
    const cnpj = document.querySelector('#cnpj')
    const nomeFeedback = document.querySelector('#nome-feedback')
    const emailFeedback = document.querySelector('#email-feedback')
    const cnpjFeedback = document.querySelector('#cnpj-feedback')
    const inputs = [
      {input: nome, feedback: nomeFeedback, min: 1, max: 100},
      {input: email, feedback: emailFeedback, min: 1, max: 255},
      {input: cnpj, feedback: cnpjFeedback, min: 14, max:14}
    ]

    let valido = true

    inputs.map((element, i) => {

      if(!validateRequiredStatus(element.input, element.feedback, 'Campo obrigatório', 'Ok!')){

        valido = false
      }else if(element.input === cnpj){

        if(!isNumeric(element.input, element.feedback, 'O campo deve ser numérico', 'Ok!')){

          valido = false
        }
      }else if(!validateLength(element.input, element.feedback, [`Mínimo ${element.min} caracteres`,
                `Máximo ${element.max} caracteres`], 'Ok!', element.max, element.min)){

        valido = false
      }
    })

    if(valido){

      document.querySelector('form').submit()
    }
  })
}
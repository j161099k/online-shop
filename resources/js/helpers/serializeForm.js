const serializeForm = function (formElement) {
  const formData = Object.fromEntries(new FormData(formElement))
  const selectMultiple = Array.from(formElement.querySelectorAll('select[multiple]'))

  if (selectMultiple.length === 0) {
    return formData
  }

  selectMultiple.map(function (element) {
    return (formData[element.name] = Array.from(element.selectedOptions).map(option=>option.value))
  })

  return formData
}

export default serializeForm

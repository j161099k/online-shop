import fillFieldData from 'helpers/fillFieldData'

const fillFormData = function (form, data) {
  form
    .find('input:not([name="_token"]), textarea, select')
    .each(function (i, element) {
      const elName = $(element).attr('name')
      return fillFieldData(element, data[elName])
    })
}

export default fillFormData

import request from 'helpers/request'
import serializeForm from 'helpers/serializeForm'

const submitForm = async function (form, url, method = 'POST') {
  const formData = serializeForm(form)
  return await request(url, method, formData)
}

export default submitForm

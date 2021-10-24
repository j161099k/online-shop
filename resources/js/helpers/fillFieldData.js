const fillFieldData = function (element, data) {
  switch (element.tagName.toLowerCase()) {
    case 'textarea':
      element.innerText = data
      break
    case 'input':
      element.value = data
      break
  }
  return element
}

export default fillFieldData
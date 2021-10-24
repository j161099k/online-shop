const request = async (targetUrl, method = 'GET', data = null) => {
  const ajaxConfig = { url: targetUrl, method: method }
  if (data != null) {
    ajaxConfig.data = data
  }
  return await $.ajax(ajaxConfig)
}

export default request
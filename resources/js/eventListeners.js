$(document).on('reset', 'form', function (e) {
  $(e.target)
    .find('textarea')
    .each((i, element) => $(element).text(''))
})

$(document).on('click', '[data-dismiss]', function (e) {
  $(this)
    .closest('.modal')
    .find('form')
    .each(function (i, element) {
      $(this).removeAttr('data-update')
      $(this).trigger('reset')
    })
})

$('[data-selectable-rows]').on('click', 'tr', function (e) {
  $(this).toggleClass('selected')
})

$(document).on('click', '[data-repeat]', function(e){
  e.preventDefault()

  if($('.is-repeatable', '.repeat-container').length > 4) {
    alert("Solo se admite un máximo de 5 productos")
    return
  }
  
  $('.is-repeatable', '.repeat-container').last().clone().appendTo('.repeat-container')
})

$(document).on('click', '[data-remove]', function (e) {
  e.preventDefault()

  if($('.is-repeatable', '.repeat-container').length === 1) {
    alert("Debe registrar por lo menos un producto")
    return
  }

  $('.is-repeatable', '.repeat-container').last().remove()
})
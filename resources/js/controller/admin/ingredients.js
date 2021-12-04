import getParentRowAndData from 'helpers/getParentRowAndData'
import createDataTable from 'helpers/createDataTable'
import request from 'helpers/request'
import fillFormData from 'helpers/fillFormData'
import submitForm from 'helpers/submitForm'

/* *
====================================
CREACIÓN DE LA TABLA CON DATATABLES
====================================
*/

const tablaIngredientes = createDataTable(
  '#ingredientes',
  route('ingredients.index'),
  [ { data: 'name' }, { data: 'stock' }, { data: 'updated_at' }],
)

tablaIngredientes.columns.adjust()

/* *
====================================================
SE AÑADE UN REGISTRO A TRAVES DE UNA PETICIÓN POST, 
SI SE PASA UN ID, SE EDITAN DATOS YA EXISTENTES
HACIENDO UNA PETICIÓN PUT
====================================================
*/
$('#formularioIngrediente').on('submit', async function (e) {
  e.preventDefault()
  if (!e.target.matches('[data-update]')) {
    const $response = await submitForm(e.target, route('ingredients.store'))

    tablaIngredientes.row.add($response).draw('page')
  } else {
    const $id = $(e.target).attr('data-update')

    const $response = await submitForm(
      e.target,
      route('ingredients.update', { ingredient: $id }),
      'PUT',
    )

    $(e.target).removeAttr('data-update')
    tablaIngredientes.row($currentRow).data($response).draw('page')
  }

  $(e.target).trigger('reset')
  $('#modal-formulario').modal('toggle')
})

/* *
======================================================
SE LLENA EL FORMULARIO CON LOS DATOS CORRESPONDIENTES
======================================================
*/

$('#ingredientes tbody').on('click', '[data-edit]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaIngredientes)

  const $form = $('#formularioIngrediente')

  fillFormData($form, $data)

  $form.attr('data-update', $data.id)
  window.$currentRow = parentRow

  $('#modal-formulario').modal('toggle')
})

/* *
=====================================================
SE BORRA UN REGISTRO A TRAVES DE UNA PETICIÓN DELETE
=====================================================
*/

$('#ingredientes tbody').on('click', '[data-delete]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaIngredientes)
  const $response = await request(
    route('ingredients.destroy', { id: $data.id }),
    'DELETE',
  )
  tablaIngredientes.row(parentRow).remove().draw('page')
})

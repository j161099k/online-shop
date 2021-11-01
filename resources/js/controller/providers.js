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
const tablaProveedores = createDataTable('#proveedores', route('providers.index'), [
  
  { data: 'first_name' },
  { data: 'last_name' },
  { data: 'phone_number' },
  { data: 'updated_at' },
])

tablaProveedores.columns.adjust()

/* *
====================================================
SE AÑADE UN REGISTRO A TRAVES DE UNA PETICIÓN POST, 
SI SE PASA UN ID, SE EDITAN DATOS YA EXISTENTES
HACIENDO UNA PETICIÓN PUT
====================================================
*/
$('#formularioProveedor').on('submit', async function (e) {
  e.preventDefault()
  if (!e.target.matches('[data-update]')) {
    const $response = await submitForm(e.target, route('providers.store'))

    tablaProveedores.row.add($response).draw('page')
  } else {
    const $id = $(e.target).attr('data-update')

    const $response = await submitForm(
      e.target,
      route('providers.update', { provider: $id }),
      'PUT',
    )

    $(e.target).removeAttr('data-update')
    tablaProveedores.row($currentRow).data($response).draw('page')
  }

  $(e.target).trigger('reset')
  $('#modal-formulario').modal('toggle')
})

/* *
======================================================
SE LLENA EL FORMULARIO CON LOS DATOS CORRESPONDIENTES
======================================================
*/

$('#proveedores tbody').on('click', '[data-edit]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaProveedores)

  const $form = $('#formularioProveedor')

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

$('#proveedores tbody').on('click', '[data-delete]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaProveedores)
  const $response = await request(
    route('providers.destroy', { id: $data.id }),
    'DELETE',
  )
  tablaProveedores.row(parentRow).remove().draw('page')
})

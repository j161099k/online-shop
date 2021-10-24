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
const tablaProductos = createDataTable('#productos', route('products.index'), [
  { data: 'id' },
  { data: 'name' },
  { data: 'stock' },
  { data: 'price' },
  { data: 'updated_at' },
])

tablaProductos.columns.adjust()

/* *
====================================================
SE AÑADE UN REGISTRO A TRAVES DE UNA PETICIÓN POST, 
SI SE PASA UN ID, SE EDITAN DATOS YA EXISTENTES
HACIENDO UNA PETICIÓN PUT
====================================================
*/
$('#formularioProducto').on('submit', async function (e) {
  e.preventDefault()
  if (!e.target.matches('[data-update]')) {
    const $response = await submitForm(e.target, route('products.store'))

    tablaProductos.row.add($response).draw('page')
  } else {
    const $id = $(e.target).attr('data-update')

    const $response = await submitForm(
      e.target,
      route('products.update', { product: $id }),
      'PUT',
    )

    $(e.target).removeAttr('data-update')
    tablaProductos.row($currentRow).data($response).draw('page')
  }

  $(e.target).trigger('reset')
  $('#modal-formulario').modal('toggle')
})

/* *
======================================================
SE LLENA EL FORMULARIO CON LOS DATOS CORRESPONDIENTES
======================================================
*/

$('#productos tbody').on('click', '[data-edit]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaProductos)

  const $form = $('#formularioProducto')

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

$('#productos tbody').on('click', '[data-delete]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaProductos)
  const $response = await request(
    route('products.destroy', { id: $data.id }),
    'DELETE',
  )
  tablaProductos.row(parentRow).remove().draw('page')
})

import getParentRowAndData from 'helpers/getParentRowAndData'
import createDataTable from 'helpers/createDataTable'
import request from 'helpers/request'
import serializeForm from 'helpers/serializeForm'
import fillFormData from 'helpers/fillFormData'

/* *
====================================
CREACIÓN DE LA TABLA CON DATATABLES
====================================
*/
const tablaCombos = createDataTable('#combos', route('combos.index'), [
  { data: 'name' },
  { data: 'stock' },
  { data: 'price' },
  { data: 'updated_at' },
])

tablaCombos.columns.adjust()

const tablaProductosCombos = $('#productos-relacionados').DataTable({
  columns: [{ data: 'id' }, { data: 'name' }],
})

/* *
====================================================
SE AÑADE UN REGISTRO A TRAVES DE UNA PETICIÓN POST, 
SI SE PASA UN ID, SE EDITAN DATOS YA EXISTENTES
HACIENDO UNA PETICIÓN PUT
====================================================
*/

$('#formularioCombo').on('submit', async function (e) {
  e.preventDefault()
  let $id = $(e.target).attr('data-update')

  const $data = serializeForm(e.target)

  if ($id != undefined) {
    const $response = await request(
      route('combos.update', { id: $id }),
      'PUT',
      $data,
    )

    $(e.target).removeAttr('data-update')

    tablaCombos.row($currentRow).data($response).draw('page')
  } else {
    const $response = await request(route('combos.store'), 'POST', $data)

    tablaCombos.row.add($response).draw('page')
  }

  $(e.target).trigger('reset')
})

/* *
======================================================
SE LLENA EL FORMULARIO CON LOS DATOS CORRESPONDIENTES
======================================================
*/

$('#combos tbody').on('click', '[data-edit]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaCombos)

  const $form = $('#formularioCombo')

  fillFormData($form, $data)

  console.log($data.products)

  $data.products.map(function (product) {
    console.log(product)
    tablaProductosCombos.rows.add(product)
  })

  tablaProductosCombos.draw('page')

  $form.attr('data-update', $data.id)
  window.$currentRow = parentRow
})

/* *
=====================================================
SE BORRA UN REGISTRO A TRAVES DE UNA PETICIÓN DELETE
=====================================================
*/

$('#combos tbody').on('click', '[data-delete]', async function (e) {
  const [parentRow, $data] = getParentRowAndData(e.target, tablaCombos)
  const $response = await request(
    route('combos.destroy', { id: $data.id }),
    'DELETE',
  )
  tablaCombos.row(parentRow).remove().draw('page')
})

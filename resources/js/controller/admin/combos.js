import getParentRowAndData from 'helpers/getParentRowAndData'
import request from 'helpers/request'
import fillFormData from 'helpers/fillFormData'
import submitForm from 'helpers/submitForm'

/* *
====================================
CREACIÓN DE LA TABLA CON DATATABLES
====================================
*/
const tablaCombos = $('#combos').DataTable({
  serverSide: true,
  ajax: route('combos.index'),
  columns: [
    { data: 'name' },
    { data: 'stock' },
    { data: 'price' },
    { data: 'updated_at' },
    { data: 'actions' },
  ],
})

const tablaProductosCombos = $('#productosCombo').DataTable({
  serverSide: true,
  search: false,
  ajax: route('admin.combos.getProducts', { combo: $('#productosCombo').attr('data-combo') }),
  columns: [
    { data: 'name' },
    { data: 'quantity' },
    { data: 'actions' },
  ]
})

$('#formularioProductoCombo').on('submit', async function (e) {
  e.preventDefault()

  const $id = $(this).attr('data-addto')

  const $products = $(this)
    .find('.row')
    .map(function (i, el) {
      const $qty = $('input', this).val()
      const $id = $('select', this).val()

      return { id: $id, quantity: $qty }
    })
    .get()

  const response = await request(
    route('admin.combos.addProducts', { combo: $id }),
    'POST',
    { products: $products }  
  )

  tablaProductosCombos.draw('page')
})

$('#productosCombo tbody').on('click', '[data-unlink]', async function (e) {
  const [$row, { id : $id }] = getParentRowAndData(this, tablaProductosCombos)
  const $comboId = $(this).closest('table').attr('data-combo')

  const result = await request(route('admin.combos.unlinkProduct', { combo: $comboId, product: $id }), 'DELETE')

  if(result === 'deleted') {
    alert('El producto fue desvinculado exitosamente!')
    tablaProductosCombos.row($row).remove().draw('page')
    return;
  }

  alert('El producto no pudo ser devinculado')
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
  if (!e.target.matches('[data-update]')) {
    const $response = await submitForm(e.target, route('combos.store'))

    tablaCombos.row.add($response).draw('page')
  } else {
    const $id = $(e.target).attr('data-update')

    const $response = await submitForm(
      e.target,
      route('combos.update', { combo: $id }),
      'PUT',
    )

    $(e.target).removeAttr('data-update')
    tablaCombos.row($currentRow).data($response).draw('page')
  }

  $(e.target).trigger('reset')
  $('#modal-formulario').modal('toggle')
})

$('#productosCombo').on('click', '[data-unlink]', function(e) {
  
})

$('#category').on('change', async function (e) {
  const $id = $(this).val()
  const products = await request(
    route('admin.categories.findProductsByCategory', { category: $id }),
  )
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

  $data.products.map(function (product) {
    tablaProductosCombos.rows.add(product)
  })

  tablaProductosCombos.draw('page')

  $form.attr('data-update', $data.id)
  window.$currentRow = parentRow

  $('#modal-formulario').modal('toggle')
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

$('#combos tbody').on('click', '[data-view]', async function (e) {
  // console.log("Event.Target:\n", e.target, "\nThis:\n", this);
  const [, $data] = getParentRowAndData(this, tablaCombos)
  location.href = route('admin.combos.edit', { combo: $data.id })
})

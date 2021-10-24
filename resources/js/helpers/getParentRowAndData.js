const getParentRowAndData = (targetCell, dataTable) => {
  const parentRow = $(targetCell).closest('tr')
  return [parentRow, dataTable.row(parentRow).data()]
}

export default getParentRowAndData

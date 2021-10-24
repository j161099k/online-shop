const createDataTable = function(tableId, ajaxUrl, columnArray, options) {
  return $(tableId).DataTable({
    serverSide: true,
    scrollY: '250px',
    ajax: ajaxUrl,
    columns: [
      ...columnArray,
      {
        defaultContent: `<button class="btn btn-sm btn-primary" data-edit>
                            <i class="fas fa-edit"></i>
                        </button>\n
                        <button class="btn btn-sm btn-outline-primary" data-delete>
                            <i class="fas fa-trash"></i>
                        </button>\n
                        ${options? options.ui.join('\n') : ''}`,
      },
    ],
    ...options,
  })
}

export default createDataTable

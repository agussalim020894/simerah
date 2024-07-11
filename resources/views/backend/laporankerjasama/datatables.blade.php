$(document).ready(function() {
	$('#datatable').DataTable({
		responsive: true,
		serverside: true,
		lengthChange: false,
		language: {
            url: "{{ asset('resources/vendor/datatables/js/indonesian.json') }}"
        },
		dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
		buttons: [
			{
				extend: 'pdfHtml5',
				text: 'PDF',
				titleAttr: 'Generate PDF',
				className: 'btn-outline-danger btn-sm mr-1',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4 ,5 ,6 ,7 ,8 ,9 ,10 ,11 ,12 ,13 ,14 ,15]
								}
			},
			{
				extend: 'excelHtml5',
				text: 'Excel',
				titleAttr: 'Generate Excel',
				className: 'btn-outline-success btn-sm mr-1',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4 ,5 ,6 ,7 ,8 ,9 ,10 ,11 ,12 ,13 ,14 ,15]
								}
			},
			{
				extend: 'print',
				text: 'Print',
				titleAttr: 'Print Table',
				className: 'btn-outline-primary btn-sm',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4 ,5 ,6 ,7 ,8 ,9 ,10 ,11 ,12 ,13 ,14 ,15]
								}
			}
		],
		processing: true,
		serverSide: true,
		ajax: "{{ url($url_admin.'/laporankerjasama/mitrakerjasama/data') }}",
		columns: [
				{ data: 'nama', searchable: false, orderable:false },
				{ data: 'satuan' },
				{ data: 'noperjanjian', orderable:false },
				{ data: 'jangkawaktu', orderable:false },
				{ data: 'urusan' },
				{ data: 'keterangan' },
				{ data: 'manfaat' },
				{ data: 'status', orderable:false },
				{ data: 'mitrakerjasama_id', orderable:false },
				{ data: 'tahun', orderable:false },
				{ data: 'action', orderable: false, searchable: false}
		]
		});
});
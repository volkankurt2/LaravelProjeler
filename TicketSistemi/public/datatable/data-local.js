//== Class definition
var DatatableChildDataLocalDemo = function () {
	//== Private functions

	var subTableInit = function (e) {
		$('<div/>').attr('id', 'child_data_local_' + e.data.RecordID).appendTo(e.detailCell)
			.mDatatable({
				data: {
					type: 'local',
					source: e.data.Orders,
					pageSize: 10,
					saveState: {
						cookie: true,
						webstorage: true
					}
				},

				// layout definition
				layout: {
					theme: 'default',
					scroll: true,
					height: 300,
					footer: false,

					// enable/disable datatable spinner.
					spinner: {
						type: 1,
						theme: 'default'
					}
				},

				sortable: true,


			});
	}

	// demo initializer
	var mainTableInit = function () {

		var dataJSONArray = JSON.parse('' +
			'[' +
			'{"RecordID":1,' +
			'"FirstName":"Mariellen",' +
			'"LastName":"Goretti",' +
			'"Company":"Chatterpoint",' +
			'"Email":"mgoretti0@omniture.com"},' +
            '{"RecordID":2,' +
            '"FirstName":"Mariellen",' +
            '"LastName":"Goretti",' +
            '"Company":"Chatterpoint",' +
            '"Email":"mgoretti0@omniture.com"}' +
			']');

		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: dataJSONArray,
				pageSize: 10, // display 20 records per page
				saveState: {
					cookie: true,
					webstorage: true
				}
			},

			// layout definition
			layout: {
				theme: 'default',
				scroll: false,
				height: null,
				footer: false
			},

			sortable: true,

			filterable: false,

			pagination: true,


			// columns definition
			columns: [{
				field: "RecordID",
				title: "",
				sortable: true,
				width: 20,
				textAlign: 'center' // left|right|center,
			}, {
				field: "FirstName",
				title: "İsim",
                width: 150
			}, {
				field: "Company",
				title: "Başlık"
			}, {
				field: "Email",
				title: "Mesaj"
			}, {
				field: "Actions",
				width: 110,
				title: "İşlemler",
				sortable: false,
				overflow: 'visible',
				template: function (row) {
					var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';
					
					return '\
						<div class="dropdown '+ dropup +'">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
						  	</div>\
						</div>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';
				}
			}]
		});

		var query = datatable.getDataSourceQuery();

		$('#m_form_search').on('keyup', function (e) {
			datatable.search($(this).val().toLowerCase());
		}).val(query.generalSearch);

		$('#m_form_status, #m_form_type').selectpicker();

	};

	return {
		//== Public functions
		init: function () {
			// init dmeo
			mainTableInit();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableChildDataLocalDemo.init();
});
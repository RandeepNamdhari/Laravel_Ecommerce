//== Class definition

var DatatableHtmlTableDemo = function() {

  var demo2=function(){
    var datatable=$('.m-datatable').mDatatable({
    data: {
        type: 'remote',
        source: {
            read: {
                url: $BASE__URL+'/get_products',
                method: 'GET',
                // custom headers
                headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                params: {
                    // custom parameters
                    generalSearch: '',
                    EmployeeID: 1,
                    someParam: 'someValue',
                    token: 'token-value'
                },
                map: function(raw) {
                    // sample data mapping
                    var dataSet = raw;
                    if (typeof raw.data !== 'undefined') {
                         dataSet = raw.data;
                    }
                    return dataSet;
                },
            }
        },
        pageSize: 10,
        saveState: {
            cookie: true,
            webstorage: true
        },

        serverPaging: true,
        serverFiltering: false,
        serverSorting: false,
        autoColumns: false
    },

    layout: {
        theme: 'default',
        class: 'm-datatable--brand',
        scroll: false,
        height: null,
        footer: false,
        header: true,

        smoothScroll: {
            scrollbarShown: true
        },

        spinner: {
            overlayColor: '#000000',
            opacity: 0,
            type: 'loader',
            state: 'brand',
            message: true
        },

        icons: {
            sort: {asc: 'la la-arrow-up', desc: 'la la-arrow-down'},
            pagination: {
                next: 'la la-angle-right',
                prev: 'la la-angle-left',
                first: 'la la-angle-double-left',
                last: 'la la-angle-double-right',
                more: 'la la-ellipsis-h'
            },
            rowDetail: {expand: 'fa fa-caret-down', collapse: 'fa fa-caret-right'}
        }
    },

    sortable: false,

    pagination: true,

    search: {
      // enable trigger search by keyup enter
      onEnter: false,
      // input text for search
      input: $('#generalSearch'),
      // search delay in milliseconds
      delay: 400,
    },

    detail: {
        title: 'Load sub table',
        content: function (e) {
            // e.data
            // e.detailCell
        }
    },

    rows: {
      callback: function() {},
      // auto hide columns, if rows overflow. work on non locked columns
      autoHide: false,
    },

    // columns definition
    columns: [
    {
        field: "RecordID",
        title: "#",
        locked: {left: 'xl'},
        sortable: false,
        width: 20,
        selector: {class: 'm-checkbox--solid m-checkbox--brand'}
    },
     {
        field: "products_id",
        title: "ID",
        sortable: false,
        filterable: false,
        width: 40,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{products_id}}'
    },{
        field: "product_name",
        title: "Product Name",
        sortable: true,
        filterable: true,
        width: 100,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{products_name}}'
    } ,{
        field: "image",
        title: "Image",
        sortable: false,
        filterable: false,
        width: 50,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{image}}'
    },{
        field: "mrp",
        title: "MRP",
        sortable: true,
        filterable: true,
        width: 50,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{mrp}}'
    },{
        field: "selling_price",
        title: "Selling Price",
        sortable: true,
        filterable: true,
        width: 50,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{selling_price}}'
    },{
        field: "manufacture",
        title: "Brand",
        sortable: true,
        filterable: true,
        width: 100,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{brand}}'
    },
    {
        field: "url",
        title: "URL",
        sortable: true,
        filterable: true,
        width: 100,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{url}}'
    },
    {
        field: "action",
        title: "Action",
        sortable: true,
        filterable: true,
        width: 100,
        responsive: {visible: 'lg'},
        locked: {left: 'xl'},
        template: '{{action}}'
    }  
    // ,{
    //     field: "products_name",
    //     title: "Product Name",
    //     width: 150,
    //     overflow: 'visible',
    //     template: function (row) {
    //         return row.ShipCountry + ' - ' + row.ShipCity;
    //     }
    // }
    // , {
    //     field: "ShipCountry",
    //     title: "Ship Country",
    //     width: 150,
    //     overflow: 'visible',
    //     sortCallback: function (data, sort, column) {
    //         var field = column['field'];
    //         return $(data).sort(function (a, b) {
    //             var aField = a[field];
    //             var bField = b[field];
    //             if (sort === 'asc') {
    //                 return parseFloat(aField) > parseFloat(bField)
    //                     ? 1 : parseFloat(aField) < parseFloat(bField)
    //                         ? -1
    //                         : 0;
    //             } else {
    //                 return parseFloat(aField) < parseFloat(bField)
    //                     ? 1 : parseFloat(aField) > parseFloat(bField)
    //                         ? -1
    //                         : 0;
    //             }
    //         });
    //     }
    // }
    ],

    toolbar: {
        layout: ['pagination', 'info'],

        placement: ['bottom'],  //'top', 'bottom'

        items: {
            pagination: {
                type: 'default',

                pages: {
                    desktop: {
                        layout: 'default',
                        pagesNumber: 6
                    },
                    tablet: {
                        layout: 'default',
                        pagesNumber: 3
                    },
                    mobile: {
                        layout: 'compact'
                    }
                },

                navigation: {
                    prev: true,
                    next: true,
                    first: true,
                    last: true
                },

                pageSizeSelect: [10, 20, 30, 50, 100]
            },

            info: true
        }
    },

    translate: {
        records: {
            processing: 'Please wait...',
            noRecords: 'No records found'
        },
        toolbar: {
            pagination: {
                items: {
                    default: {
                        first: 'First',
                        prev: 'Previous',
                        next: 'Next',
                        last: 'Last',
                        more: 'More pages',
                        input: 'Page number',
                        select: 'Select page size'
                    },
                    info: 'Displaying {{start}} - {{end}} of {{total}} records'
                }
            }
        }
    }
})
  }
  //== Private functions

  // demo initializer
  var demo = function() {



    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#generalSearch'),
      },
      columns: [
	    {
          field: 'ID',
		  width: 20,
          type: 'number',
        },
		{
          field: 'Cat Name',
		  width: 300,
          type: 'number',
        },
		{
          field: 'Filter Name',
		  width: 250,
        },
		{
          field: 'Group Assigned',
		  width: 350,
        },
		{
          field: 'Icon',
		  width: 100,
        },
		{
          field: 'Deposit Paid',
		  width: 10,
          type: 'number',
        },
		{
          field: 'Items',
		  width: 40,
          type: 'number',
        },
        {
          field: 'Status',
		  width: 60,
        },
        {
          field: 'Order Date',
		  width: 30,
          type: 'date',
          format: 'YYYY-MM-DD',
        },
      ],
    });
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo2();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});


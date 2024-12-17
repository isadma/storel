$.extend( true, $.fn.dataTable.defaults, {
    responsive: true,
    lengthMenu: [50, 75, 100, 150],
    pageLength: 50,
    order: [[0, 'desc']],
    columnDefs: [
        { searchable: false, targets: [0, -1] }
    ],
    buttons: [
        {
            extend : "pdfHtml5",
            title: "report",
            customize: function(win)
            {
                let css = "@page { size: landscape; }",
                    head = win.document.head || win.document.getElementsByTagName("head")[0],
                    style = win.document.createElement("style");

                style.type = "text/css";
                style.media = "print";

                if (style.styleSheet)
                {
                    style.styleSheet.cssText = css;
                }
                else
                {
                    style.appendChild(win.document.createTextNode(css));
                }

                head.appendChild(style);
            },
            exportOptions: {
                columns: "th:not(:last-child)"
            },
        },
        {
            extend : "excelHtml5",
            title: "report",
            exportOptions: {
                columns: "th:not(:last-child)"
            }
        },
        {
            extend : "pdfHtml5",
            title: "report",
            exportOptions: {
                columns: "th:not(:last-child)"
            },
            orientation: "landscape"
        }
    ]
});

dataTable = $(".kt_table").DataTable();

$('.printReport').on('click', function(e) {
    e.preventDefault();
    dataTable.button(0).trigger();
});
$('.exportReportToExcel').on('click', function(e) {
    e.preventDefault();
    dataTable.button(1).trigger();
});
$('.exportReportToPdf').on('click', function(e) {
    e.preventDefault();
    dataTable.button(2).trigger();
});

$('#datatableFilterForm').on('submit', function(event) {
    event.preventDefault();
    dataTable.draw();
});

$(".kt_daterangepicker_dropdown").daterangepicker({
    autoApply: true,
    startDate: moment().startOf('month').format('DD/MM/YYYY'),
    endDate: moment().endOf('month').format('DD/MM/YYYY'),
    locale: {
        format: 'DD/MM/YYYY'
    }
});

$('#dtSearch').keyup(function(){
    dataTable.search($(this).val()).draw() ;
})

function viewTable() {
    var table = $("#products_table").DataTable({
        responsive: true,
        "ajax": $('#products_data').attr('data_url'),
        "columns":[
            {data:'id', name: "ID"},
            {data:'Date', name:"Date"},
            {data:'Client', name:"Client"},
            {data:'options', name:"Options"}
        ]
    })
    return table;
}

$(function(){
    var table = viewTable();
})
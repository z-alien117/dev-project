function viewTable() {
    var table = $("#clients_table").DataTable({
        responsive: true,
        "ajax": $('#clients_data').attr('data_url'),
        "columns":[
            {data:'id', name: "ID"},
            {data:'name', name:"Name"},
            {data:'options', name:"Options"}
        ]
    })
    return table;
}

$(function(){
    var table = viewTable();
})
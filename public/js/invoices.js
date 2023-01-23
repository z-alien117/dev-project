function viewTable() {
    var table = $("#products_table").DataTable({
        responsive: true,
        "ajax": $('#products_data').attr('data_url'),
        "columns":[
            {data:'id', name: "ID"},
            {data:'Client', name:"Client"},
            {data:'Date', name:"Date"},
            {data:'options', name:"Options"}
        ]
    })
    return table;
}

async function openModal(url, btn, text){
    await openModalAsync(url, btn, text);
    $('.selectpicker').selectpicker();
    $('.datetimepicker').datetimepicker({
        showClose: true
    });
}

$(function(){
    var table = viewTable();


    $(document).on('click','.btn_add',function(){
        var btn = $(this);
        var text = '<span><i class="icon-plus1"></i>New Invoice</span>';
        var url = $(this).attr('get_url');
        openModal(url,btn,text);
    })
})
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
    $(document).on('click','.btn_add', function(){
        var btn = $(this);
        var text = '<span><i class="icon-plus1"></i>New Client</span>';
        var url = $(this).attr('get_url');
        // console.log(url);
        // console.log(text);
        openModal(url,btn,text);
    })

    $(document).on('click','.btn_save', function(){
        var btn = $(this);
        // console.log(btn);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('DynamicForm'));
        // console.log(formData);
        $.ajax({
            url: $("#DynamicForm").attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                hideModal();
                Swal.fire(
                    'Correct',
                    'Client added',
                    'success'
                );
                table.ajax.reload();
            }
        })
        .fail(function(result){
            Swal.fire(
                'Error',
                'Please verify the data',
                'error'
            );
            enable_btn(btn, '<i class="icon-save2"></i>Save')
        })
        
    })

    $(document).on('click', '.btn_edit', function(){
        var btn = $(this);
        var text = "<i class='icon-line-edit-2'></i> Edit";
        var url = $(this).attr('get_url');
        openModal(url,btn,text);
    })
})
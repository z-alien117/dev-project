function viewTable() {
    var table = $("#products_table").DataTable({
        responsive: true,
        "ajax": $('#products_data').attr('data_url'),
        "columns":[
            {data:'id', name: "ID"},
            {data:'name', name:"Name"},
            {data:'price', name:"Price"},
            {data:'options', name:"Options"}
        ]
    })
    return table;
}

$(function(){
    var table = viewTable();
    $(document).on('click','.btn_add',function(){
        var btn = $(this);
        var text = '<span><i class="icon-plus1"></i>New Product</span>';
        var url = $(this).attr('get_url');
        openModal(url,btn,text);
    })

    $(document).on('click','.btn_save',function(){
        var btn = $(this);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('DynamicForm'));
        $.ajax({
            url: $('#DynamicForm').attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                hideModal();
                Swal.fire(
                    'Correct',
                    'Product added',
                    'success'
                );
                table.ajax.reload();
            },
            error: function(result,status,xhr){
                console.log(result);
                $errors = result['responseJSON']['errors'];
                Object.entries($errors).forEach(entry => {
                    const [key,value]=entry;
                    console.log(key);
                    document.getElementById(key).classList.add("error");
                });
                Swal.fire(
                    'Error',
                    'Please verify the required data',
                    'error'
                )
            enable_btn(btn, '<i class="icon-save2"></i>Save');
            }
        })
        // .fail(function(result){
        //     Swal.fire(
        //         'Error',
        //         'Please verify the data',
        //         'error'
        //     );
        //     enable_btn(btn, '<i class="icon-save2"></i>Save');
        // });
    });


})
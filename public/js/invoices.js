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

    $(document).on('click','.btn_save',function(){
        var btn = $(this);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('DynamicForm'));
        console.log(formData)
        $.ajax({
            url: $('#DynamicForm').attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                console.log(result);
                // hideModal();
                $('#client').prop('disabled',true);
                $('#client').selectpicker('refresh');
                $('#date').prop('disabled', true);
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
    });
})
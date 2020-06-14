function deleteProduct(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: "products/delete/" + id,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    
                    if(data.code == 200){
                        $(`.delete-product-${data.product_id}`).closest('tr').remove(); 
                        $.toast({
                            text: "Don't forget to star the repository if you like it.",
                            heading: 'Note',
                            icon: 'success', 
                            showHideTransition: 'slide', 
                            allowToastClose: true, 
                            hideAfter: 2000, 
                            stack: 5, 
                            position: 'bottom-right', 
                
                            textAlign: 'left',  
                            loader: true,  
                            loaderBg: '#9EC600', 
                        });
                        console.log(data.product_id);
                    }
                },
                error: function (errors) {  
                    console.log(erros);
                }
            });
        }
    })
}


function alertSucess()
{
    alert('fdsa');
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


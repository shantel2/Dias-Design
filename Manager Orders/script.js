window.addEventListener('load',(e)=>{
    let table = document.getElementById('table');
    
    for(let i =1; i < table.rows.length; i++){
        let UPDATE_BUTTON = $(`#${ table.rows[i].cells[7].innerHTML}`);
        let INVOICE_BUTTON = $(`#invoice_${table.rows[i].cells[7].innerHTML}`);
        let UPLOAD_BUTTON = $(`#upload_${table.rows[i].cells[7].innerHTML}`);
        let VIEW_BUTTON = $(`#view_${table.rows[i].cells[7].innerHTML}`);
        
        
        UPDATE_BUTTON.on('click',e=>{
            window.location.href = `manage_order_update_page.php?order_id=${e.target.id}`;

        });

        
        INVOICE_BUTTON.on('click', e=>{
            let order_id = e.target.id.slice(8); // Slices of the word 'delete from the ID'
            window.location.href = `create_invoice_service.php?order_ID=${order_id}`;

            // +++++++++===+++++++++++ Considered using AJAX  ==++===+++==++==+

            
            //     let req = {order_ID:`${order_id}` };
            // $.ajax({
            //     type: "POST",
            //     url:"manage_order_update_page.php",
            //     data: req,
            //     dataType: "html"
            // }).done(
            //     response=>{
            //         alert(response);
            //     }
            // ).fail(()=>{
            //     alert("Failed to generate invoice");
            // }                
            // );
        });

        UPLOAD_BUTTON.on('click',e=>{
            let order_id = e.target.id.slice(7); // slice off the word upload_
            window.location.href = `file-upload.php?order_id=${order_id}`;

        });


        VIEW_BUTTON.on('click',e=>{
            let order_id = e.target.id.slice(5); // slice off the word 'view_'
            window.location.href = `display_invoice_service.php?order_id=${order_id}`;

        });
    }





});
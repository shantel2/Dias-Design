window.addEventListener('load',(e)=>{

    let table = document.getElementById('table');

    if (table){

        for(let i =1; i < table.rows.length; i++){
    
            let DELETE_BUTTON = $(`#delete${ table.rows[i].cells[5].innerHTML}`);
            let EDIT_BUTTON = $(`#edit${ table.rows[i].cells[5].innerHTML}`);
    
            DELETE_BUTTON.on("click",e=>{
                let cnfm = confirm("Are you sure you want to delete this Item?");
                if(cnfm == TRUE){
    
                    let productID = e.target.id.slice(6); // Slices of the word 'delete from the ID'
                    
                    let request = {prod_id: productID};
    
                    $.ajax({
                        type: "POST",
                        url: "menu_manager_remove.php",
                        data: request,
                        dataType: "html"
                    }).done(response =>{
                        tempAlert(`${response}`,2000);
                    }).fail(()=>{
                        tempAlert("Failed to Delete Product",2000);
    
                    })
                    e.preventDefault();
                }
               
            });
    
            EDIT_BUTTON.on("click",e=>{
      
                productID = e.target.id.slice(4);// Slices of the word 'edit from the ID'
                let request = {prod_id: productID};
                window.location.href = `menu_manager_update_page.php?prod_id=${productID}`;
    
            })
    
        }
    }


    function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
 location.reload();
}

$( function() {
    $( "#dialog" ).dialog();
  } );

});
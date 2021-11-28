window.addEventListener('load',(e)=>{
    let table = document.getElementById('table');
    
    for(let i =1; i < table.rows.length; i++){
        let UPDATE_BUTTON = $(`#${ table.rows[i].cells[7].innerHTML}`);
        
        UPDATE_BUTTON.on('click',e=>{
            window.location.href = `manage_order_update_page.php?order_id=${e.target.id}`;

        });
    }


});
window.addEventListener('load',(e)=>{

    let table = document.getElementById('table');

    for(let i =1; i < table.rows.length; i++){
        let VIEW_BUTTON = $(`#view_${table.rows[i].lastElementChild.childNodes[0].id.slice(5)}`); //slice is to remove 'view_'

        console.log(table.rows[i].lastElementChild.childNodes[0].id.slice(5));



        VIEW_BUTTON.on('click',e=>{
            let order_id = e.target.id.slice(5); // slice off the word 'view_'
            window.location.href = `display_invoice_user.php?order_id=${order_id}`;

        });
    }




});
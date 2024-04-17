$("document").ready(function () {
    ajaxGet();
    $("#button").on("click", function (){
        let company='';
        let hardware_name='';
        let country='';
        //Заполнить Компанию
        if(document.getElementById('Sony').checked)
            if (company.length == '') company = company + document.getElementById('Sony').value;
        else company = company+"_"+document.getElementById('Sony').value;
        if(document.getElementById('Nokia').checked)
            if (company.length == '') company = company + document.getElementById('Nokia').value;
            else company = company+"_"+document.getElementById('Nokia').value;
        if(document.getElementById('Samsung').checked)
            if (company.length == '') company = company + document.getElementById('Samsung').value;
            else company = company+"_"+document.getElementById('Samsung').value;
        //Заполнить название АО
        if(document.getElementById('keyboard').checked)
            if (hardware_name.length == '') hardware_name = hardware_name + document.getElementById('keyboard').value;
            else hardware_name = hardware_name+"_"+document.getElementById('keyboard').value;
        if(document.getElementById('mouse').checked)
            if (hardware_name.length == '') hardware_name = hardware_name + document.getElementById('mouse').value;
            else hardware_name = hardware_name+"_"+document.getElementById('mouse').value;
        if(document.getElementById('monitor').checked)
            if (hardware_name.length == '') hardware_name = hardware_name + document.getElementById('monitor').value;
            else hardware_name = hardware_name+"_"+document.getElementById('monitor').value;
        //Заполнить Страну
        if(document.getElementById('Russia').checked)
            if (country.length == '') country = country + document.getElementById('Russia').value;
            else country = country+"_"+document.getElementById('Russia').value;
        if(document.getElementById('China').checked)
            if (country.length == '') country = country + document.getElementById('China').value;
            else country = country+"_"+document.getElementById('China').value;
        if(document.getElementById('Japan').checked)
            if (country.length == '') country = country + document.getElementById('Japan').value;
            else country = country+"_"+document.getElementById('Japan').value;
        $.ajax({
            url: 'http://localhost:63342/NMSTU/ajax-php.php',
            type: 'POST',
            dataType: 'json',
            data: {
                company: company,
                hardware_name: hardware_name,
                country: country,
            },
            success: function(data){
            }
        })
        setTimeout(ajaxGet(), 1);
        ajaxGet();
    })
})

function ajaxGet(){

    var request = new XMLHttpRequest();

    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#ch_items').innerHTML = request.responseText;
        }
    }
    request.open('GET','http://localhost:63342/NMSTU/formingsql.php');
    request.send();
}
function go(url) {
    $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: url, // the url where we want to POST
            dataType: 'html', // what type of data do we expect back from the server
            encode: true
        })
        // using the done promise callback
        .done(function(data) {
            $('#contenedor').html(data);
            $('#usertable').dataTable();
            // here we will handle errors and validation messages
        });
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    //}    
}


function Asyc(vUrl, vData, vidDiv) {
    $.ajax({
        // la URL para la petición
        url: vUrl,
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: vData, //{ id : 123 },
        // especifica si será una petición POST o GET
        type: 'POST',
        // el tipo de información que se espera de respuesta
        dataType: 'Html',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success: function(response) {
            //mostramos salida del PHP
            jQuery("#" + vidDiv).html(response);
            $('#usertable').dataTable();
        },
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });
}

function AsycWindow(vUrl, vData, vidDiv) {
    $.ajax({
        // la URL para la petición
        url: vUrl,
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: vData, //{ id : 123 },
        // especifica si será una petición POST o GET
        type: 'POST',
        // el tipo de información que se espera de respuesta
        dataType: 'Html',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success: function(response) {
            //mostramos salida del PHP
            jQuery("#" + vidDiv).html(response);
            $('#usertable').dataTable();
        },
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });
}


function save_r(vUrl, vData, id_form, key, id_resul, extra = '') {

     $.ajax({
        // la URL para la petición
        url: vUrl,
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: vData, //{ id : 123 },
        // especifica si será una petición POST o GET
        type: 'POST',
        // el tipo de información que se espera de respuesta
        dataType: 'Html',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success: function(response) {
                if(!isNaN(response.trim())){
                    toastr['info']('Se ingreso/Actualizo Correctamente el Registro. ID: ' + response.trim());
                    document.getElementById(id_form).value = response.trim();
                    vData = {'proceso' : key, 'extra' : extra}
                    Asyc(vUrl,vData, id_resul);
                }else{
                    toastr['error'](response);
                }        
        },
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });
}



function guardar(vUrl, vData, vidDiv) {
    $.ajax({
        // la URL para la petición
        url: vUrl,
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: vData, //{ id : 123 },
        // especifica si será una petición POST o GET
        type: 'POST',
        // el tipo de información que se espera de respuesta
        dataType: 'Html',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success: function(response) {
           return response;
        },
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });
}


function buscar(vUrl, vData, vidDiv) {
    $.ajax({
        // la URL para la petición
        url: vUrl,
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: vData, //{ id : 123 },
        // especifica si será una petición POST o GET
        type: 'POST',
        // el tipo de información que se espera de respuesta
        dataType: 'Html',
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success: function(response) {
            //mostramos salida del PHP
            jQuery("#" + vidDiv).html(response);
            $('#usertable').dataTable();
        },
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });
}

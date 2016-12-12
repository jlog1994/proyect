var ver
function mostrar(dato) {
    obj = document.getElementById("contenido" + dato);
    ver.style.display = 'none';
    obj.style.display = 'block';
    ver = obj;
}
//CLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTES
function valida() {
    /*var expr=/^([A-Z]|[a-z]){4}[0-9]{6}$/   
     var errorMessage = 'RFC incorrecto' 
     var valor=document.form1.rfc.value.match(expr)
     if ((valor==null) || document.form1.rfc.value.length==0){
     alert(errorMessage)
     document.form1.rfc.focus()
     return 0;
     }
     var expr= /^(([A-Z]|[a-z])+\s([A-Z]|[a-z])+)$/  
     var errorMessage = 'NOMBRE incorrecto' 
     var valor=document.form1.nombre.value.match(expr)
     if ((valor==null) || document.form1.nombre.value.length==0){
     alert(errorMessage)
     document.form1.nombre.focus()
     return 0;
     }
     var expr= /^(([A-Z]|[a-z])+\s([A-Z]|[a-z])+)$/ 
     var errorMessage = 'DIRECCION incorrecto' 
     var valor=document.form1.direccion.value.match(expr)
     if ((valor==null) || document.form1.direccion.value.length==0){
     alert(errorMessage)
     document.form1.direccion.focus()
     return 0;
     }
     var expr= /^[0-9]{2,3}-? ?[0-9]{6,7}|-$/  
     var errorMessage = 'TELEFONO incorrecto' 
     var valor=document.form1.telefono.value.match(expr)
     if ((valor==null) || document.form1.telefono.value.length==0){
     alert(errorMessage)
     document.form1.telefono.focus()
     return 0;
     }	
     var expr= /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/ 
     var errorMessage = 'E_MAIL incorrecto' 
     var valor=document.form1.email.value.match(expr)
     if ((valor==null) || document.form1.email.value.length==0){
     alert(errorMessage)
     document.form1.email.focus()
     return 0;
     }*/
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.form1.ncapa.value = '3';
        document.forms.form1.submit();
    }
}
function validaform3() {//consulta clientes
    /*	var errorMessage = 'Inserte la cadena a buscar' ;
     if (document.form3.buscar1.value.length==0){
     alert(errorMessage);
     document.form3.buscar1.focus();
     return 0;
     }*/
    document.form3.ncapa.value = '4';
    document.forms.form3.submit();
}
function conmodbaja(i) {//funcion de boton para ir a formulario de mod. y bajas de clientes
    document.form4.rfc5.value = i;
    document.form4.ncapa.value = '5';
    document.forms.form4.submit();
}
function conmodbajapub(i) {//funcion de boton para ir a formulario de mod. y bajas de clientes
    document.formimagenes.rfc5.value = i;
    document.formimagenes.ncapa.value = '5';
    document.forms.formimagenes.submit();
}
function actualiza() {
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.form5.ncapa.value = '5';
        document.form5.g.value = 1;
        document.forms.form5.submit();
        document.form5.af.value = 0;
    }
}
function afoto() {
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.form5.ncapa.value = '5';
        document.form5.g.value = 0;
        document.form5.af.value = 1;
        document.forms.form5.submit();
    }
}
function baja() {
    var msg = confirm("Esta seguro que desea eliminarlo si");
    if (msg) {
        document.form4.ncapa.value = '5';
        document.form4.b.value = 1;
        document.forms.form4.submit();
    }
}
function hayerror() {
    if (document.form1.error.value != "") {
        alert(document.form1.error.value);
        document.form1.error.value = '';
        //document.form1.focusFirstElement();
    }
}
//FIN CLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTESCLIENTES
//INICIA USUARIOS INICIA USUARIOS INICIA USUARIOS INICIA USUARIOS INICIA USUARIOS INICIA USUARIOS INICIA USUARIOS
function validacu() {
    if (document.formau.password1.value != document.formau.password2.value) {
        alert("Los password deben ser iguales")
        document.formac.password1.focus()
        return 0;
    }
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.formac.ncapa.value = '1';
        document.forms.formac.submit();
    }
}
function validaformcu() {//consulta clientes
    document.formcu.ncapa.value = '2';
    document.forms.formcu.submit();
}
function conmodbajacu(i) {//funcion de boton para ir a formulario de mod. y bajas de usuarios
    document.formccu.cuenta.value = i;
    document.formccu.ncapa.value = '6';
    document.forms.formccu.submit();
}
function actualizau() {
    if (document.formmcu.passwordmu.value != document.formmcu.passwordmu2.value) {
        alert("Los password deben ser iguales")
        document.formmcu.password1.focus()
        return 0;
    }
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.formmcu.ncapa.value = '6';
        document.formmcu.gu.value = 1;
        document.forms.formmcu.submit();
    }
}
//INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-INICIA-FIN-
function validaindex() {
    var msg = confirm("Esta seguro que los datos son correctos");
    if (msg) {
        document.formindex.ncapa.value = '20';
        document.forms.formindex.submit();
    }
}
function hayerror2() {
    if (document.formindex.error.value != "") {
        alert(document.formindex.error.value);
        document.formindex.error.value = '';
        //document.form1.focusFirstElement();
    }
}
function cerrarsesion() {
    var msg = confirm("Esta seguro de cerrar sesion");
    if (msg) {
        location.href = 'datos.php?ncapa=21';
    }
}
function excel() {
    if (document.form3.criterios.value == 'Nombre' && document.form3.buscar1.value.length == 0) {
        alert("Inserte el texto a buscar")
        document.form3.buscar1.focus()
        return 0;
    }
    var msg = confirm("Esta seguro de generar el archivo de excel");
    if (msg) {
        form3.action = "excel.php";
        form3.submit( );
    }
}

function word() {
    if (document.form3.criterios.value == 'Nombre' && document.form3.buscar1.value.length == 0) {
        alert("Inserte el texto a buscar")
        document.form3.buscar1.focus()
        return 0;
    }
    var msg = confirm("Esta seguro de generar el archivo de word");
    if (msg) {
        form3.action = "word.php";
        form3.submit( );
    }
}

function imprimir(pp) {
    if (window.print)
        window.print('pp')
    else
        alert("Para imprimir presione Crtl+P.");
}



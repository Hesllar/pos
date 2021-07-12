$(document).ready(function() {
        $('#region').change(function() {
            var ciudad_id = $('#region').val();

            var action = 'get_comuna';

            if (ciudad_id != '') {

                $.ajax({
                    url:  '/pos/public/Comuna/action',
                    method: "POST",
                    data: {
                        id_region: ciudad_id,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Seleccione comuna</option>';
                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].id_comuna + '">' + data[count].nombre_comuna + '</option>';
                        }
                        $('#comuna').html(html);
                    }
                });
            }

        });
    });
// Formulario de módulo cliente
function textCliente(x) {
        if (x == 0) {
            document.getElementById("rut_emp").style.display = "block",
                document.getElementById("razon").style.display = "block",
                document.getElementById("giro").style.display = "block",
                document.getElementById("telefono").style.display = "block",
                document.getElementById("titulo").style.display = "block",
                document.getElementById("dv_emp").style.display = "block";

        } else
            document.getElementById("rut_emp").style.display = "none",
            document.getElementById("razon").style.display = "none",
            document.getElementById("giro").style.display = "none",
            document.getElementById("telefono").style.display = "none",
            document.getElementById("titulo").style.display = "none",
            document.getElementById("dv_emp").style.display = "none";
        return;
    }

    
    $("#registroCliente").submit(function(e) {
        var fun = "funregistrar";
        var rut = $("#rut").val();
        var dv = $("#dv").val();
        var nombres = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var correo = $("#email").val();
        var celular = $("#celular").val();
        var juridico = $("#juridico").val();
        var ciudad = $("#ciudad").val();
        var calle = $("#calle").val();
        var numero = $("#numero").val();
        var nom_usuario = $("#nombre_usuario").val();
        var contraseña = $("#contraseña").val();
        var contraseña2 = $("#contraseña2").val();
        var avatar = $("#imagen").val();

        if (rut == '') {
            setTimeout(function() {
                $("#lbRut").html("<span style='color:red;'> Complete el campo rut </span>").fadeOut(10000);
            }, 0);

            $("#rut").focus();
            return false;

        } else if (dv == '') {
            setTimeout(function() {
                $("#lbDv").html("<span style='color:red;'> Complete el campo dv </span>").fadeOut(10000);
            }, 0);

            $("#dv").focus();
            return false;
        } else if (nombres == '') {
            setTimeout(function() {
                $("#lbNombre").html("<span style='color:red;'> Complete el campo nombre</span>").fadeOut(10000);
            }, 0);

            $("#nombre").focus();
            return false;
        } else if (apellidos == '') {
            setTimeout(function() {
                $("#lbApellido").html("<span style='color:red;'> Complete el campo apellido </span>").fadeOut(10000);
            }, 0);

            $("#apellidos").focus();
            return false;
        } else if (correo == '') {
            setTimeout(function() {
                $("#lbCorreo").html("<span style='color:red;'> complete el campo correo </span>").fadeOut(10000);
            }, 0);

            $("#email").focus();
            return false;
        } else if (celular == '') {
            setTimeout(function() {
                $("#lbCelular").html("<span style='color:red;'> complete el celular </span>").fadeOut(10000);
            }, 0);

            $("#celular").focus();
            return false;
        } else if (juridico == '') {
            setTimeout(function() {
                $("#lbJuridico").html("<span style='color:red;'> complete el campo juridico </span>").fadeOut(10000);
            }, 0);

            $("#juridico").focus();
            return false;
        } else if (ciudad == '') {
            setTimeout(function() {
                $("#lbCiudad").html("<span style='color:red;'> complete el campo ciudad </span>").fadeOut(10000);
            }, 0);

            $("#ciudad").focus();
            return false;
        } else if (calle == '') {
            setTimeout(function() {
                $("#lbCalle").html("<span style='color:red;'> complete el campo calle </span>").fadeOut(10000);
            }, 0);

            $("#calle").focus();
            return false;
        } else if (numero == '') {
            setTimeout(function() {
                $("#lbNumero").html("<span style='color:red;'> complete el campo numero</span>").fadeOut(10000);
            }, 0);

            $("#numero").focus();
            return false;
        } else if (nom_usuario == '') {
            setTimeout(function() {
                $("#lbNomUsuario").html("<span style='color:red;'> complete el campo nombre usuario </span>").fadeOut(10000);
            }, 0);

            $("#nombre_usuario").focus();
            return false;
        } else if (contraseña == '') {
            setTimeout(function() {
                $("#lbContraseña").html("<span style='color:red;'> complete el campo contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña").focus();
            return false;
        } else if (contraseña2 == '') {
            setTimeout(function() {
                $("#lbContraseña2").html("<span style='color:red;'> complete el campo reingresar contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (contraseña != contraseña2) {
            setTimeout(function() {
                $("#lbValidContraseña").html("<span style='color:red;'> Las contraseña no son iguales </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (avatar == '') {
            setTimeout(function() {
                $("#lbAvatar").html("<span style='color:red;'> complete el campo imagen </span>").fadeOut(10000);
            }, 0);

            $("#imagen").focus();
            return false;
        } else {
            $.ajax({
                url:  '/pos/public/Registro/registroUsuario',
                method: "POST",
                success: function(){
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro exitoso',
                    showConfirmButton: false,
                    timer: 1500
                });
               setTimeout(() => {window.location.href = '/pos/public/contacto';}, 1500);
                }
            });
        }
    });
// Formulario de módulo administrador
     function textUsuario(x) {
        if (x == 0) {
            document.getElementById("rut_emp").style.display = "block",
                document.getElementById("razon").style.display = "block",
                document.getElementById("giro").style.display = "block",
                document.getElementById("telefono").style.display = "block",
                document.getElementById("titulo").style.display = "block",
                document.getElementById("dv_emp").style.display = "block",
                document.getElementById("seccion-prove").style.display = "block";

        } else
            document.getElementById("rut_emp").style.display = "none",
            document.getElementById("razon").style.display = "none",
            document.getElementById("giro").style.display = "none",
            document.getElementById("telefono").style.display = "none",
            document.getElementById("titulo").style.display = "none",
            document.getElementById("dv_emp").style.display = "none",
            document.getElementById("rubro").style.display = "none",
            document.getElementById("seccion-prove").style.display = "none";
        return;
    }
     function textProv(x) {


        if (x == 0) {
            document.getElementById("rubro").style.display = "block";

        } else
            document.getElementById("rubro").style.display = "none";
        return;
    }

    function datosSucursal() {
        var id_sucursal = $("#id_sucursal").val();
        console.log(id_sucursal);
        $.ajax({
            url: '/pos/public/Usuarios',
            method: "GET",
            data: {
                id_sucursal_fk: id_sucursal
            }
        })
    }
    $("#agregarUsuarioForm").submit(function(e) {
        var fun = "funregistrar";
        var rut = $("#rut").val();
        var dv = $("#dv").val();
        var nombres = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var correo = $("#email").val();
        var celular = $("#celular").val();
        var juridico = $("#juridico").val();
        var ciudad = $("#ciudad").val();
        var calle = $("#calle").val();
        var numero = $("#numero").val();
        var nom_usuario = $("#nombre_usuario").val();
        var contraseña = $("#contraseña").val();
        var contraseña2 = $("#contraseña2").val();
        var avatar = $("#imagen").val();
        var rut_emp = $("#rut_emp").val();

        if (rut == '') {
            setTimeout(function() {
                $("#lbRut").html("<span style='color:red;'> Complete el campo rut </span>").fadeOut(10000);
            }, 0);

            $("#rut").focus();
            return false;

        } else if (dv == '') {
            setTimeout(function() {
                $("#lbDv").html("<span style='color:red;'> Complete el campo dv </span>").fadeOut(10000);
            }, 0);

            $("#dv").focus();
            return false;
        } else if (nombres == '') {
            setTimeout(function() {
                $("#lbNombre").html("<span style='color:red;'> Complete el campo nombre</span>").fadeOut(10000);
            }, 0);

            $("#nombre").focus();
            return false;
        } else if (apellidos == '') {
            setTimeout(function() {
                $("#lbApellido").html("<span style='color:red;'> Complete el campo apellido </span>").fadeOut(10000);
            }, 0);

            $("#apellidos").focus();
            return false;
        } else if (correo == '') {
            setTimeout(function() {
                $("#lbCorreo").html("<span style='color:red;'> complete el campo correo </span>").fadeOut(10000);
            }, 0);

            $("#email").focus();
            return false;
        } else if (celular == '') {
            setTimeout(function() {
                $("#lbCelular").html("<span style='color:red;'> complete el celular </span>").fadeOut(10000);
            }, 0);

            $("#celular").focus();
            return false;
        } else if (juridico == '') {
            setTimeout(function() {
                $("#lbJuridico").html("<span style='color:red;'> complete el campo juridico </span>").fadeOut(10000);
            }, 0);

            $("#juridico").focus();
            return false;

        } else if (ciudad == '') {
            setTimeout(function() {
                $("#lbCiudad").html("<span style='color:red;'> complete el campo ciudad </span>").fadeOut(10000);
            }, 0);

            $("#ciudad").focus();
            return false;
        } else if (calle == '') {
            setTimeout(function() {
                $("#lbCalle").html("<span style='color:red;'> complete el campo calle </span>").fadeOut(10000);
            }, 0);

            $("#calle").focus();
            return false;
        } else if (numero == '') {
            setTimeout(function() {
                $("#lbNumero").html("<span style='color:red;'> complete el campo numero</span>").fadeOut(10000);
            }, 0);

            $("#numero").focus();
            return false;
        } else if (nom_usuario == '') {
            setTimeout(function() {
                $("#lbNomUsuario").html("<span style='color:red;'> complete el campo nombre usuario </span>").fadeOut(10000);
            }, 0);

            $("#nombre_usuario").focus();
            return false;
        } else if (contraseña == '') {
            setTimeout(function() {
                $("#lbContraseña").html("<span style='color:red;'> complete el campo contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña").focus();
            return false;
        } else if (contraseña2 == '') {
            setTimeout(function() {
                $("#lbContraseña2").html("<span style='color:red;'> complete el campo reingresar contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (contraseña != contraseña2) {
            setTimeout(function() {
                $("#lbValidContraseña").html("<span style='color:red;'> Las contraseña no son iguales </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (avatar == '') {
            setTimeout(function() {
                $("#lbAvatar").html("<span style='color:red;'> complete el campo imagen </span>").fadeOut(10000);
            }, 0);

            $("#imagen").focus();
            return false;
        } else {
            $.ajax({
                url: '/pos/public/Usuarios/insertar',
                method: "POST",
                data: {
                    "funcion": fun,
                    "rut": rut,
                    "dv": dv,
                    "nombres": nombres,
                    "apellidos": apellidos,
                    "correo": correo,
                    "celular": celular,
                    "juridico": juridico,
                    "ciudad": ciudad,
                    "calle": calle,
                    "numero": numero,
                    "nom_usuario": nom_usuario,
                    "contraseña": contraseña,
                    "contraseña2": contraseña2,
                    "avatar": avatar
                },
                success: function() {

                }
            });
        }
    });


    //Formulario módulo empleado
    $("#agregarProveedorForm").submit(function(e) {
        var fun = "funregistrar";
        var rut = $("#rut").val();
        var dv = $("#dv").val();
        var nombres = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var correo = $("#email").val();
        var celular = $("#celular").val();
        var juridico = $("#juridico").val();
        var ciudad = $("#ciudad").val();
        var calle = $("#calle").val();
        var numero = $("#numero").val();
        var nom_usuario = $("#nombre_usuario").val();
        var contraseña = $("#contraseña").val();
        var contraseña2 = $("#contraseña2").val();
        var avatar = $("#imagen").val();
        var rutEmp = $("#rut_emp").val();
        var dvEmp = $("#dv_emp").val();
        var rubro = $("#rubro").val();
        var razon = $("#razon").val();
        var giro = $("#giro").val();
        if (rut == '') {
            setTimeout(function() {
                $("#lbRut").html("<span style='color:red;'> Complete el campo rut </span>").fadeOut(10000);
            }, 0);

            $("#rut").focus();
            return false;

        } else if (dv == '') {
            setTimeout(function() {
                $("#lbDv").html("<span style='color:red;'> Complete el campo dv </span>").fadeOut(10000);
            }, 0);

            $("#dv").focus();
            return false;
        } else if (nombres == '') {
            setTimeout(function() {
                $("#lbNombre").html("<span style='color:red;'> Complete el campo nombre</span>").fadeOut(10000);
            }, 0);

            $("#nombre").focus();
            return false;
        } else if (apellidos == '') {
            setTimeout(function() {
                $("#lbApellido").html("<span style='color:red;'> Complete el campo apellido </span>").fadeOut(10000);
            }, 0);

            $("#apellidos").focus();
            return false;
        } else if (correo == '') {
            setTimeout(function() {
                $("#lbCorreo").html("<span style='color:red;'> complete el campo correo </span>").fadeOut(10000);
            }, 0);

            $("#email").focus();
            return false;
        } else if (celular == '') {
            setTimeout(function() {
                $("#lbCelular").html("<span style='color:red;'> complete el celular </span>").fadeOut(10000);
            }, 0);

            $("#celular").focus();
            return false;
        } else if (rutEmp == '') {
            setTimeout(function() {
                $("#lbRutEmp").html("<span style='color:red;'> complete el campo rut empresa </span>").fadeOut(10000);
            }, 0);

            $("#rut_emp").focus();
            return false;
        } else if (dvEmp == '') {
            setTimeout(function() {
                $("#lbDvEmp").html("<span style='color:red;'> complete el campo dv empresa </span>").fadeOut(10000);
            }, 0);

            $("#dv_emp").focus();
            return false;
        } else if (rubro == '') {
            setTimeout(function() {
                $("#lbRubroEmp").html("<span style='color:red;'> complete el campo rubro </span>").fadeOut(10000);
            }, 0);

            $("#rubro").focus();
            return false;
        } else if (razon == '') {
            setTimeout(function() {
                $("#lbRazonEmp").html("<span style='color:red;'> complete el campo razón social</span>").fadeOut(10000);
            }, 0);

            $("#razon").focus();
            return false;
        } else if (giro == '') {
            setTimeout(function() {
                $("#lbGiroEmp").html("<span style='color:red;'> complete el campo giro </span>").fadeOut(10000);
            }, 0);

            $("#giro").focus();
            return false;
        } else if (ciudad == '') {
            setTimeout(function() {
                $("#lbCiudad").html("<span style='color:red;'> complete el campo ciudad </span>").fadeOut(10000);
            }, 0);

            $("#ciudad").focus();
            return false;
        } else if (calle == '') {
            setTimeout(function() {
                $("#lbCalle").html("<span style='color:red;'> complete el campo calle </span>").fadeOut(10000);
            }, 0);

            $("#calle").focus();
            return false;
        } else if (numero == '') {
            setTimeout(function() {
                $("#lbNumero").html("<span style='color:red;'> complete el campo numero</span>").fadeOut(10000);
            }, 0);

            $("#numero").focus();
            return false;
        } else if (nom_usuario == '') {
            setTimeout(function() {
                $("#lbNomUsuario").html("<span style='color:red;'> complete el campo nombre usuario </span>").fadeOut(10000);
            }, 0);

            $("#nombre_usuario").focus();
            return false;
        } else if (contraseña == '') {
            setTimeout(function() {
                $("#lbContraseña").html("<span style='color:red;'> complete el campo contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña").focus();
            return false;
        } else if (contraseña2 == '') {
            setTimeout(function() {
                $("#lbContraseña2").html("<span style='color:red;'> complete el campo reingresar contraseña </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (contraseña != contraseña2 || contraseña2 != contraseña) {
            setTimeout(function() {
                $("#lbValidContraseña").html("<span style='color:red;'> Las contraseña no son iguales </span>").fadeOut(10000);
            }, 0);

            $("#contraseña2").focus();
            return false;

        } else if (avatar == '') {
            setTimeout(function() {
                $("#lbAvatar").html("<span style='color:red;'> complete el campo imagen </span>").fadeOut(10000);
            }, 0);

            $("#imagen").focus();
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>/Proveedor/insertarProveedor",
                method: "POST",
                data: {
                    "funcion": fun,
                    "rut": rut,
                    "dv": dv,
                    "nombre": nombres,
                    "apellidos": apellidos,
                    "correo": correo,
                    "celular": celular,
                    "juridico": juridico,
                    "ciudad": ciudad,
                    "calle": calle,
                    "numero": numero,
                    "nom_usuario": nom_usuario,
                    "contraseña": contraseña,
                    "contraseña2": contraseña2,
                    "avatar": avatar,
                    "rut_emp": rutEmp,
                    "dv_emp": dvEmp,
                    "rubro": rubro,
                    "razon": razon,
                    "giro": giro,
                }
            });
        }
    });

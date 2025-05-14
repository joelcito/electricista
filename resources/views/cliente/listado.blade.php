@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .tamanio_boton{
            font-size: 6px;
        }
    </style>
@endsection
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<!--begin::Modal - Add task-->
<div class="modal fade" id="modalCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">FORMULARIO DE CLIENTE <span class="text-info" id="nombre_busqueda"></span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <form id="formularioCliente">
                    <input type="text" name="cliente_id" id="cliente_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Nombres</label>
                                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Ap Paterno</label>
                                <input type="text" class="form-control form-control-sm" id="ap_paterno" name="ap_paterno">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Ap Materno</label>
                                <input type="text" class="form-control form-control-sm" id="ap_materno" name="ap_materno">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Cedula</label>
                                <input type="text" class="form-control form-control-sm" id="cedula" name="cedula">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Direccion</label>
                                <input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Celular</label>
                                <input type="text" class="form-control form-control-sm" id="celular" name="celular">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Correo</label>
                                <input type="text" class="form-control form-control-sm" id="correo" name="correo">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm w-100 btn-success" onclick="guardarCliente()">Guardar</button>
                    </div>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="modalMedidor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">MEDIDORES DEL CLIENTE <span class="text-info" id="nombre_cliente"></span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <div id="table_medidores">

                </div>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->


<!--begin::Modal - Add task-->
<div class="modal fade" id="modalLectura" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">FORMULARIO DE LECTURA DEL MEDIDOR N: <span class="text-info texto_medidor" ></span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <form id="formularioLectura">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Fecha</label>
                                <input type="date" class="form-control form-control-sm" id="fecha_consumo" name="fecha_consumo">
                                <input type="text" id="medidor_id_consumo" name="medidor_id_consumo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Consumo</label>
                                <input type="text" class="form-control form-control-sm" id="consumo_consumo" name="consumo_consumo">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm w-100 btn-success" onclick="guardarLectura()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="modalListaLecturas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">LISTADO DE LECTURAS DEL MEDIDOR N: <span class="text-info texto_medidor"></span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <div id="table_lecturas">

                </div>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="modalAgregarMedidor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">FORMULARIO DE MEDIDOR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <form id="formularioMedidor">
                    <input type="hidden" name="medidor_cliente_id" id="medidor_cliente_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Numero medidor</label>
                                <input type="number" class="form-control form-control-sm" id="numero_medidor" name="numero_medidor">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm w-100 btn-dark" onclick="volverMedidor()">Volver</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-sm w-100 btn-success" onclick="guardarMedidor()">Guardar</button>
                    </div>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxlg">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header flex-wrap bg-light-info py-4">
                    <h3
                        class="card-title page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        LISTADO DE CLIENTES</h3>
                    <div class="card-toolbar">
                        <a class="btn btn-sm fw-bold btn-primary" onclick="modalCliente()"><i
                                class="fa fa-plus"></i>Nuevo Cliente</a>
                    </div>
                </div>

                <div class="card-body py-4">
                    <div id="table_listado">

                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->

@stop()

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $.ajaxSetup({
            // definimos cabecera donde estarra el token y poder hacer nuestras operaciones de put,post...
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $(document).ready(function() {
            ajaxListado();
        });


        function modalCliente(){

            $('#cliente_id').val(0)
            $('#nombre').val('')
            $('#ap_paterno').val('')
            $('#ap_materno').val('')
            $('#cedula').val('')
            $('#direccion').val('')
            $('#celular').val('')
            $('#correo').val('')

            $('#modalCliente').modal('show')
        }

        function ajaxListado(){
            let datos = {};
            $.ajax({
                url: "{{ url('cliente/ajaxListado') }}",
                method: "POST",
                data: datos,
                success: function (resultado) {

                    if(resultado.estado){
                        $('#table_listado').html(resultado.data.listado)
                    }else{

                    }
                    // Ocultar SweetAlert2 cuando la solicitud sea exitosa
                    // Swal.close();
                }
            })
        }

        // function limpiarErorres(){
        //     $(".invalid-feedback").remove();
        //     $(".is-invalid").removeClass("is-invalid");
        // }

        // function modalNuevoRol(){
        //     limpiarErorres();

        //     $('#id').val(0)
        //     $('#nombre').val('')
        //     $('#modalRol').modal('show')
        // }

        function guardarCliente(){
            let datos = $('#formularioCliente').serializeArray();
            $.ajax({
                url: "{{ url('cliente/guardar') }}",
                method: "POST",
                data: datos,
                success: function (resultado) {
                    if(resultado.estado){
                        Swal.fire({
                            title: "EL REGISTRO FUE EXITOSO.",
                            icon: "success",
                            timer: 3000, // Se cierra en 3 segundos
                            showConfirmButton: false
                        });
                        ajaxListado();
                        $('#modalCliente').modal('hide')
                    }else{

                    }
                },
                error: function (xhr) {
                    // limpiarErorres();

                    // if (xhr.status === 422) {
                    //     let errores = xhr.responseJSON.errors;

                    //     for (let campo in errores) {
                    //         let mensaje = errores[campo][0];

                    //         let input = $(`[name="${campo}"]`);
                    //         input.addClass("is-invalid");
                    //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
                    //     }
                    // } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    // }
                }
            });
        }

        function modalMedidores(cliente){

            $.ajax({
                url: "{{ url('cliente/ajaxMedidores') }}",
                method: "POST",
                data: {cliente_id:cliente.id},
                success: function (resultado) {
                    if(resultado.estado){
                        // Swal.fire({
                        //     title: "EL REGISTRO FUE EXITOSO.",
                        //     icon: "success",
                        //     timer: 3000, // Se cierra en 3 segundos
                        //     showConfirmButton: false
                        // });
                        // ajaxListado();
                        // $('#modalCliente').modal('hide')

                        $('#nombre_cliente').text(cliente.nombres+" "+cliente.ap_paterno+" "+cliente.ap_materno)
                        $('#table_medidores').html(resultado.data.listado);
                        $('#modalMedidor').modal('show')
                    }else{

                    }
                },
                error: function (xhr) {
                    // limpiarErorres();

                    // if (xhr.status === 422) {
                    //     let errores = xhr.responseJSON.errors;

                    //     for (let campo in errores) {
                    //         let mensaje = errores[campo][0];

                    //         let input = $(`[name="${campo}"]`);
                    //         input.addClass("is-invalid");
                    //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
                    //     }
                    // } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    // }
                }
            });

        }

        function modalAgregarMedidor(cliente){
            $('#medidor_cliente_id').val(cliente)
            $('#modalAgregarMedidor').modal('show')
            $('#modalMedidor').modal('hide')
        }

        function guardarMedidor(){

            let datos = $('#formularioMedidor').serializeArray()

            $.ajax({
                url   : "{{ url('cliente/guardarMedidor') }}",
                method: "POST",
                data  : datos,
                success: function (resultado) {
                    if(resultado.estado){
                        Swal.fire({
                            title: "EL REGISTRO FUE EXITOSO.",
                            icon: "success",
                            timer: 3000, // Se cierra en 3 segundos
                            showConfirmButton: false
                        });
                        $('#table_medidores').html(resultado.data.listado)
                        volverMedidor();
                    }else{

                    }
                },
                error: function (xhr) {
                    // limpiarErorres();

                    // if (xhr.status === 422) {
                    //     let errores = xhr.responseJSON.errors;

                    //     for (let campo in errores) {
                    //         let mensaje = errores[campo][0];

                    //         let input = $(`[name="${campo}"]`);
                    //         input.addClass("is-invalid");
                    //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
                    //     }
                    // } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    // }
                }
            });
        }

        function volverMedidor(){
            $('#modalAgregarMedidor').modal('hide')
            $('#modalMedidor').modal('show')
        }

        function realizaLecturaMedidor(medidor, numero){
            $('#fecha_consumo').val('')
            $('#consumo_consumo').val(0)
            $('#medidor_id_consumo').val(medidor)
            $('.texto_medidor').text(numero)
            $('#modalListaLecturas').modal('hide')
            $('#modalLectura').modal('show');
        }

        function listaLecturas(medidor, numero){

            $.ajax({
                url   : "{{ url('lectura/ajaxListado') }}",
                method: "POST",
                data  : {medidor_id:medidor},
                success: function (resultado) {
                    if(resultado.estado){

                        $('.texto_medidor').text(numero)
                        $('#table_lecturas').html(resultado.data.listado);
                        $('#modalMedidor').modal('hide')
                        $('#modalListaLecturas').modal('show')

                        // Swal.fire({
                        //     title: "EL REGISTRO FUE EXITOSO.",
                        //     icon: "success",
                        //     timer: 3000, // Se cierra en 3 segundos
                        //     showConfirmButton: false
                        // });
                        // $('#table_medidores').html(resultado.data.listado)
                        // volverMedidor();
                    }else{

                    }
                },
                error: function (xhr) {
                    // limpiarErorres();

                    // if (xhr.status === 422) {
                    //     let errores = xhr.responseJSON.errors;

                    //     for (let campo in errores) {
                    //         let mensaje = errores[campo][0];

                    //         let input = $(`[name="${campo}"]`);
                    //         input.addClass("is-invalid");
                    //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
                    //     }
                    // } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    // }
                }
            });

        }

        function guardarLectura(){
            let datos = $('#formularioLectura').serializeArray()

            $.ajax({
                url   : "{{ url('lectura/guardaLectura') }}",
                method: "POST",
                data  : datos,
                success: function (resultado) {
                    if(resultado.estado){
                        Swal.fire({
                            title: "EL REGISTRO FUE EXITOSO.",
                            icon: "success",
                            timer: 3000, // Se cierra en 3 segundos
                            showConfirmButton: false
                        });
                        $('#table_lecturas').html(resultado.data.listado)
                        $('#modalAgregarMedidor').modal('hide')
                        $('#modalListaLecturas').modal('show')
                    }else{

                    }
                },
                error: function (xhr) {
                    // limpiarErorres();

                    // if (xhr.status === 422) {
                    //     let errores = xhr.responseJSON.errors;

                    //     for (let campo in errores) {
                    //         let mensaje = errores[campo][0];

                    //         let input = $(`[name="${campo}"]`);
                    //         input.addClass("is-invalid");
                    //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
                    //     }
                    // } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error inesperado.',
                        });
                    // }
                }
            });
        }

        // function editarRol(rol){
        //     limpiarErorres();

        //     Object.keys(rol).forEach(key => {
        //         let input = $(`#${key}`);
        //         if (input.length) {
        //             input.val(rol[key]);
        //         }
        //     });
        //     $('#modalRol').modal('show')
        // }

        // function eliminarRol(rol){
        //     Swal.fire({
        //         title: "Quieres eliminar "+rol.nombre,
        //         text: "Ya no podras recuperarlo!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonText: "Si, borrar!",
        //         cancelButtonText: "No, cancelar!",
        //         reverseButtons: true
        //     }).then(function(result) {
        //         if (result.value) {
        //             $.ajax({
        //                 url: "{{ url('rol/eliminarRol') }}",
        //                 method: "POST",
        //                 data: rol,
        //                 success: function (resultado) {
        //                     if(resultado.estado){
        //                         ajaxListado();
        //                     }
        //                 },
        //                 error: function (xhr) {
        //                     Swal.fire({
        //                         icon: 'error',
        //                         title: 'Error',
        //                         text: 'Ocurrió un error inesperado.',

        //                     });
        //                 }
        //             });
        //         } else if (result.dismiss === "cancel") {
        //             Swal.fire(
        //                 "Cancelado",
        //                 "La operacion fue cancelada",
        //                 "error"
        //             )
        //         }
        //     });

        // }

   </script>
@endsection

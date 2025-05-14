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
<div class="modal fade" id="modalCosto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h3 class="fw-bold">FORMULARIO DE COSTO</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <form id="formularioCosto">
                    <input type="text" name="costo_id" id="costo_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control form-control-sm">
                                    <option value="">Seleccione</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Valor</label>
                                <input type="text" class="form-control form-control-sm" id="valor" name="valor">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Descripcion</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion" name="descripcion">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm w-100 btn-success" onclick="guardarCategoria()">Guardar</button>
                    </div>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->


{{-- <!--begin::Modal - Add task-->
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
<!--end::Modal - Add task--> --}}

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
                        LISTADO DE COSTO</h3>
                    <div class="card-toolbar">
                        <a class="btn btn-sm fw-bold btn-primary" onclick="modalCosto()"><i
                                class="fa fa-plus"></i>Nuevo Costo</a>
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


        function modalCosto(){

            $('#costo_id').val(0)
            $('#categoria_id').val('')
            $('#valor').val('')
            $('#descripcion').val('')

            $('#modalCosto').modal('show')
        }

        function ajaxListado(){
            let datos = {};
            $.ajax({
                url: "{{ url('costo/ajaxListado') }}",
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

        function guardarCategoria(){
            let datos = $('#formularioCosto').serializeArray();
            $.ajax({
                url: "{{ url('costo/guardar') }}",
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
                        $('#modalCosto').modal('hide')
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

        // function modalMedidores(cliente){

        //     $.ajax({
        //         url: "{{ url('cliente/ajaxMedidores') }}",
        //         method: "POST",
        //         data: {cliente_id:cliente.id},
        //         success: function (resultado) {
        //             if(resultado.estado){
        //                 // Swal.fire({
        //                 //     title: "EL REGISTRO FUE EXITOSO.",
        //                 //     icon: "success",
        //                 //     timer: 3000, // Se cierra en 3 segundos
        //                 //     showConfirmButton: false
        //                 // });
        //                 // ajaxListado();
        //                 // $('#modalCliente').modal('hide')

        //                 $('#nombre_cliente').text(cliente.nombres+" "+cliente.ap_paterno+" "+cliente.ap_materno)
        //                 $('#table_medidores').html(resultado.data.listado);
        //                 $('#modalMedidor').modal('show')
        //             }else{

        //             }
        //         },
        //         error: function (xhr) {
        //             // limpiarErorres();

        //             // if (xhr.status === 422) {
        //             //     let errores = xhr.responseJSON.errors;

        //             //     for (let campo in errores) {
        //             //         let mensaje = errores[campo][0];

        //             //         let input = $(`[name="${campo}"]`);
        //             //         input.addClass("is-invalid");
        //             //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
        //             //     }
        //             // } else {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Error',
        //                     text: 'Ocurrió un error inesperado.',
        //                 });
        //             // }
        //         }
        //     });

        // }

        // function modalAgregarMedidor(cliente){
        //     $('#medidor_cliente_id').val(cliente)
        //     $('#modalAgregarMedidor').modal('show')
        //     $('#modalMedidor').modal('hide')
        // }

        // function guardarMedidor(){

        //     let datos = $('#formularioMedidor').serializeArray()

        //     $.ajax({
        //         url   : "{{ url('cliente/guardarMedidor') }}",
        //         method: "POST",
        //         data  : datos,
        //         success: function (resultado) {
        //             if(resultado.estado){
        //                 Swal.fire({
        //                     title: "EL REGISTRO FUE EXITOSO.",
        //                     icon: "success",
        //                     timer: 3000, // Se cierra en 3 segundos
        //                     showConfirmButton: false
        //                 });
        //                 $('#table_medidores').html(resultado.data.listado)
        //                 volverMedidor();
        //             }else{

        //             }
        //         },
        //         error: function (xhr) {
        //             // limpiarErorres();

        //             // if (xhr.status === 422) {
        //             //     let errores = xhr.responseJSON.errors;

        //             //     for (let campo in errores) {
        //             //         let mensaje = errores[campo][0];

        //             //         let input = $(`[name="${campo}"]`);
        //             //         input.addClass("is-invalid");
        //             //         input.after(`<div class="invalid-feedback">${mensaje}</div>`);
        //             //     }
        //             // } else {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Error',
        //                     text: 'Ocurrió un error inesperado.',
        //                 });
        //             // }
        //         }
        //     });
        // }

        // function volverMedidor(){
        //     $('#modalAgregarMedidor').modal('hide')
        //     $('#modalMedidor').modal('show')
        // }


   </script>
@endsection

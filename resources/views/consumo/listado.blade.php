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
                <h3 class="fw-bold">FORMULARIO DE CONSUMO</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body scroll-y">
                <form id="formularioConsumo">
                    <input type="text" name="consumo_id" id="consumo_id">
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
                        <button class="btn btn-sm w-100 btn-success" onclick="guardarConsumo()">Guardar</button>
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
                        LISTADO DE CONSUMO</h3>
                    <div class="card-toolbar">
                        <a class="btn btn-sm fw-bold btn-primary" onclick="modalConsumo()"><i
                                class="fa fa-plus"></i>Nuevo Consumo</a>
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


        function modalConsumo(){

            $('#consumo_id').val(0)
            $('#categoria_id').val('')
            $('#valor').val('')
            $('#descripcion').val('')

            $('#modalCosto').modal('show')
        }

        function ajaxListado(){
            let datos = {};
            $.ajax({
                url: "{{ url('consumo/ajaxListado') }}",
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

        function guardarConsumo(){
            let datos = $('#formularioConsumo').serializeArray();
            $.ajax({
                url: "{{ url('consumo/guardar') }}",
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

   </script>
@endsection

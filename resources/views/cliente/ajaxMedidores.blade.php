<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <button class="btn w-100 btn-sm btn-primary" onclick="modalAgregarMedidor('{{$cliente_id}}')"><i class="fa fa-plus"></i>Agregar Medidor</button>
    </div>
</div>
<div style="overflow-x: auto;">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_medidores">
        <thead>
            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                <th>Numero</th>
                <th>Estado</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            @forelse ( $medidores as $medidor)
                <tr>
                    <td>{{ $medidor->numero }}</td>
                    <td>Activo</td>
                    <td>
                        {{-- <button class="btn btn-icon btn-sm btn-info btn-circle" title="Realizar lectura" onclick="realizaLecturaMedidor('{{ $medidor->id }}', '{{ $medidor->numero }}')"><i class="fa fa-plus"></i></button> --}}
                        <button class="btn btn-icon btn-sm btn-dark btn-circle" title="Listado de lecturas" onclick="listaLecturas('{{ $medidor->id }}', '{{ $medidor->numero }}')"><i class="fa fa-brands fa-readme"></i></button>
                        {{-- <button class="btn btn-icon btn-sm btn-danger btn-circle" title="Eliminar cliente" onclick="eliminarRol({{ json_encode($cliente) }})"><i class="fa fa-trash"></i></button> --}}
                    </td>
                </tr>
            @empty
                <h4 class="text-danger">No hay datos</h4>
            @endforelse
        </tbody>
    </table>
    <!--end::Table-->
</div>

<script>
    $(document).ready(function() {
            $('#kt_table_medidores').DataTable({
                lengthMenu: [10, 25, 50, 100], // Opciones de longitud de página
                dom: '<"dt-head row"<"col-md-6"l><"col-md-6"f>><"clear">t<"dt-footer row"<"col-md-5"i><"col-md-7"p>>', // Use dom for basic layout
                language: {
                paginate: {
                    first : 'Primero',
                    last : 'Último',
                    next : 'Siguiente',
                    previous: 'Anterior'
                },
                search : 'Buscar:',
                lengthMenu: 'Mostrar _MENU_ registros por página',
                info : 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                emptyTable: 'No hay datos disponibles'
                },
                order:[],
                //  searching: true,
                responsive: true
            });


        });
</script>

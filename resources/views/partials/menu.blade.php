<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        {{-- <span class="menu-heading fw-bold text-uppercase fs-7">MENUS</span> --}}
                        <span class="fs-7 text-white fw-boldn">MENUS</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('usuario/*', 'rol/*', 'proveedor/*', 'unidadMedida/*', 'puntoVenta/*', 'productoServicio/*', 'producto/*', 'cliente/*', 'urlApiServicio/*') ? 'show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa fa-university"></i>
                        </span>
                        <span class="menu-title text-white">Administracion</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link " href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Usuarios</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link " href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Roles</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('costo/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Costos</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link " href="{{ url('consumo/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Consumos</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('categoria/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Categorias</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link " href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Medidores</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link " href="{{ url('cliente/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Clientes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link " href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Servicios</span>
                            </a>
                        </div>
                        {{--
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'cliente.listado' ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Clientes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'urlApiServicio.listado' ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Url Api Servicios</span>
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('pago/*', 'cotizacion/*') ? 'show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa fa-university"></i>
                        </span>
                        <span class="menu-title text-white">Facturacion</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('factura/formulario') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Formulario Facturacion</span>
                            </a>
                        </div>
                        {{-- <div class="menu-item">
                            <a class="menu-link" href="{{ url('lectura/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Lectura</span>
                            </a>
                        </div> --}}
                        {{-- <div class="menu-item">
                            <a class="menu-link" href="{{ url('factura/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Listado Facturas</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'pago.listado' ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Listado Pagos</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'pago.listadoDeuda' ? 'active' : '' }}"
                                href="{{ route('pago.listadoDeuda') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Cuentas por Cobrar</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'cotizacion.consulta' ? 'active' : '' }}"
                                href="{{ route('cotizacion.consulta') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Cotizaciones</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('caja/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Cajas</span>
                            </a>
                        </div> --}}

                        {{-- <div class="menu-item">
                            <a class="menu-link" href="{{ url('caja/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Flujo de Caja</span>
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa fa-university"></i>
                        </span>
                        <span class="menu-title text-white">SIAT</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('sincronizacion/listado') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white">Sincronizacion de Catalogos</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="menu-item">
                    <a class="menu-link {{ Route::currentRouteName() == 'reporte.listado' ? 'active' : '' }}"
                        href="{{ route('reporte.listado') }}">
                        <span class="menu-icon">
                            <i class="fa fa-book"></i>
                        </span>
                        <span class="menu-title text-white">REPORTES</span>
                    </a>
                </div> --}}

                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
</div>

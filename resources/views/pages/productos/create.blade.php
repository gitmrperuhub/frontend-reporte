@extends('master.master')
@section('title', 'Usuarios - Ventas')
@section('contentHeaderLeft')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Productos
        <span class="h-20px border-gray-300 border-start mx-4"></span>
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="javascript:void()" class="text-muted text-hover-primary">Crear</a>
        </li>
    </ul>
@endsection()
@section('contentHeaderRight')
    <div class="m-0">
        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
            </svg>
        </span>Filter</a>
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6244763d93048">
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
            </div>
            <div class="separator border-gray-200"></div>
            <div class="px-7 py-5">
                <div class="mb-10">
                    <label class="form-label fw-bold">Status:</label>
                    <div>
                        <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6244763d93048" data-allow-clear="true">
                            <option></option>
                            <option value="1">Approved</option>
                            <option value="2">Pending</option>
                            <option value="2">In Process</option>
                            <option value="2">Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="mb-10">
                    <label class="form-label fw-bold">Member Type:</label>
                    <div class="d-flex">
                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                            <input class="form-check-input" type="checkbox" value="1" />
                            <span class="form-check-label">Author</span>
                        </label>
                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                            <span class="form-check-label">Customer</span>
                        </label>
                    </div>
                </div>
                <div class="mb-10">
                    <label class="form-label fw-bold">Notifications:</label>
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                        <label class="form-check-label">Enabled</label>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <a href="../../demo1/dist/.html" class="btn btn-sm btn-dark-degradate border-radius-30 d-none" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Agregar nuevo producto</a>
    <a href="#" class="btn btn-sm btn btn-dark-degradate border-radius-30" id="modal_show_producto">Agregar Nuevo producto</a>
@endsection()
@section('contentModal')
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_modal_new_target_form" class="form" action="#">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Set First Target</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need more info, please check
                            <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Target Title</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="target_title" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Assign</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign">
                                    <option value="">Select user...</option>
                                    <option value="1">Karina Clark</option>
                                    <option value="2">Robert Doe</option>
                                    <option value="3">Niel Owen</option>
                                    <option value="4">Olivia Wild</option>
                                    <option value="5">Sean Bean</option>
                                </select>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Due Date</label>
                                <!--begin::Input-->
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid ps-12" placeholder="Select a date" name="due_date" />
                                    <!--end::Datepicker-->
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-bold mb-2">Target Details</label>
                            <textarea class="form-control form-control-solid" rows="3" name="target_details" placeholder="Type Target Details"></textarea>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Tags</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target priorty"></i>
                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" value="Important, Urgent" name="tags" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-stack mb-8">
                            <!--begin::Label-->
                            <div class="me-5">
                                <label class="fs-6 fw-bold">Adding Users by Team Members</label>
                                <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label fw-bold text-muted">Allowed</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-15 fv-row">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="fw-bold me-5">
                                    <label class="fs-6">Notifications</label>
                                    <div class="fs-7 text-muted">Allow Notifications by Phone or Email</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Checkboxes-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="email" checked="checked" />
                                        <span class="form-check-label fw-bold">Email</span>
                                    </label>
                                    <!--end::Checkbox-->
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="phone" />
                                        <span class="form-check-label fw-bold">Phone</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Checkboxes-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_productos"  tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h2>Crear Productos</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" id="modal_close_Producto"  >
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 pt-15">
                    <form class="form position-relative" novalidate="novalidate" id="kt_modal_create_producto_form">
                        <div class="mask-content position-absolute"></div>
                        <input type="hidden" id="idProducto" name="idProducto">
                        <div class="row" >
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate" >
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Categoria</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="La categoria del producto del fue clasificado"></i>
                                </label>
                                <select class="form-select form-select-solid mb-2" id="categoria_id" name="categoria_id" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_modal_create_productos" data-allow-clear="false">
                                    <option value="0">Seleccione categoria</option>
                                    @foreach ($rsRecursoCategoria as $val)
                                        <option value="{{$val->id}}">{{$val->nombre}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger empty_error" data-error="El campo categoria es obligatorio." id="error_categoria_id" ></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Codigo</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Código del producto, este campo es único."></i>
                                </label>
                                <input type="text" maxlength="100" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese un código" name="codigo" id="codigo" />
                                <span class="text-danger empty_error" data-error="El campo código es obligatorio."  id="error_codigo" ></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate" >
                                <label class="required fs-6 fw-bold mb-2">Laboratorio</label>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Laboratorio del que proviene el producto"></i>
                                <select class="form-select form-select-solid mb-2" id="laboratorio_id" name="laboratorio_id" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_modal_create_productos" data-allow-clear="false">
                                    <option value="0">Seleccione laboratorio</option>
                                        <option value="1">Laboratorio 1</option>
                                        <option value="2">Laboratorio 2</option>
                                        <option value="3">Laboratorio 3</option>
                                </select>
                                <span class="text-danger empty_error" data-error="El campo Laboratorio es obligatorio."  id="error_laboratorio_id" ></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Descripción</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Descripción del producto."></i>
                                </label>
                                <input type="text" maxlength="100" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese una descripcion" name="descripcion" id="descripcion" />
                                <span class="text-danger empty_error" data-error="El campo descripción es obligatorio." id="error_descripcion" ></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Marca</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Marca del producto"></i>
                                </label>
                                <input type="text" maxlength="100" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese una marca" name="marca" id="marca"  />
                                <span class="text-danger empty_error" data-error="El campo marca es obligatorio." id="error_marca" ></span>
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Síntoma</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                </label>
                                <input type="text" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese descripción sítoma" name="sintomas" id="sintomas"  />
                                <span class="text-danger empty_error" data-error="El campo síntoma es obligatorio." id="error_sintomas" ></span>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="">Registro Sanitario</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Registro sanitaro."></i>
                                </label>
                                <input type="text" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese registro sanitario" name="registro_sanitario" id="registro_sanitario" />
                                <!--span class="text-danger empty_error" data-error="El campo reg sanitario es obligatorio." id="error_registro_sanitario" ></span-->
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="required fs-6 fw-bold mb-2">U. medida</label>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unidad de medida"></i>
                                <select class="form-select form-select-solid mb-2" name="unidad_medida" id="unidad_medida" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign">
                                    @foreach ($rsRecursoUnidadMedidad as $val)
                                        <option value="{{$val->nombre}}">{{$val->nombre}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger empty_error"  data-error="El campo U. medida es obligatorio."  id="error_unidad_medida" ></span>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">N° de lote</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Número de lote"></i>
                                </label>
                                <input type="text" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese número de lote" name="numero_lote" id="numero_lote" />
                                <span class="text-danger empty_error" data-error="El campo número lote es obligatorio."  id="error_numero_lote" ></span>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Precio compra</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Precio de compra."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese precio compra" name="precio_compra" id="precio_compra"  />
                                <span class="text-danger empty_error"  data-error="El campo precio compra es obligatorio."  id="error_precio_compra" ></span>
                            </div>

                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Precio venta mínimo</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Precio de venta mínimo."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2"  placeholder="Ingrese precio minimo" name="precio_venta_min" id="precio_venta_min"  />
                                <span class="text-danger empty_error"  data-error="El campo precio venta mínimo es obligatorio."  id="error_precio_venta_min" ></span>
                            </div>

                            <div class="col-xl-4 col-md-4 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Precio venta máximo</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Precio de venta máximo."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese precio maximo" name="precio_venta_max" id="precio_venta_max" />
                                <span class="text-danger empty_error"  data-error="El campo precio venta máximo es obligatorio."  id="error_precio_venta_max" ></span>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Stock</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stock, cantidad de producto que ingresa a almacen."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese stock" name="stock" id="stock"  />
                                <span class="text-danger empty_error" data-error="El campo stock es obligatorio."  id="error_stock" ></span>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Stock mínimo</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stock mínimo."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese stock mínimo" name="stock_min" id="stock_min"  />
                                <span class="text-danger empty_error" data-error="El campo stock mínimo es obligatorio."  id="error_stock_min" ></span>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Stock alerta</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stock alerta, este campo le notificara que el producto ya no cuenta con suficiente stock."></i>
                                </label>
                                <input type="number" data-number='true' class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese stock alerta" name="stock_alerta" id="stock_alerta"  />
                                <span class="text-danger empty_error" data-error="El campo stock alerta es obligatorio."  id="error_stock_alerta" ></span>
                            </div> 
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-8 form_validate">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Stock de registro</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stock de registro, este campo es el registro inicial, no cambiará por descuento de stock"></i>
                                </label>
                                <input type="number" disabled data-number='true' id="idStockRegistro" class="form-control form-control-lg form-control-solid mb-2" placeholder="Ingrese stock registro"/>
                            </div>                            
                            <div class="col-md-6 fv-row mb-8 form_validate">
                                <label class="required fs-6 fw-bold mb-2">Fecha de vencimiento</label>
                                <div class="position-relative d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <input class="form-control form-control-solid ps-12 mb-2" id="fecha_venc" placeholder="Seleccione fecha vencimiento" name="fecha_venc" />
                                </div>
                                <span class="text-danger empty_error"  data-error="El campo fecha vencimiento es obligatorio."  id="error_fecha_venc" ></span>
                            </div>
                            <div class="col-md-6 fv-row mb-8 form_validate">
                                <label class="required fs-6 fw-bold mb-2">Fecha de vencimiento</label>
                                <div class="position-relative d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <input class="form-control form-control-solid ps-12 mb-2" id="fecha_venc_alerta" placeholder="Seleccione fecha alerta" name="fecha_venc_alerta" />
                                </div>
                                <span class="text-danger empty_error"  data-error="El campo fecha vecimiento es obligatorio."  id="error_fecha_venc_alerta" ></span>
                            </div>
                            <div class="col-md-12 fv-row mb-8 form_validate">
                                <label class="required fs-6 fw-bold mb-2">Estado</label>
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="estado" name="estado" checked="checked" />
                                    <label class="form-check-label">Disponible</label>
                                </div>
                            </div>
                            <div class=" col-md-12 fv-row text-center" id="kt_modal_btn_opciones"  >
                                <button type="button" id="kt_modal_productos_cancel" class="btn btn-light me-3 btn-light-degradate border-radius-30">Cancelar</button>
                                <button type="button" id="kt_btn_new_producto" class="btn btn-success-degradate border-radius-30">
                                    <span class="indicator-label">Guardar producto</span>
                                    <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection()
@section('content')
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
            
        </div>
    </div>

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Lista de productos</span>
            </h3>
            <div class="card-toolbar d-none">
                <a href="#" class="btn btn-dark-degradate border-radius-30" data-bs-toggle="modal" data-bs-target="#kt_modal_create_productos">Agregar Nuevo producto</a>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table id="table_producto" class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <thead class="">
                        <tr class="fw-bolder text-muted">
                            <th class="">
                            </th>
                            <th class="min-w-120px text-dark">Codigo </th>
                            <th class="min-w-150px text-dark">Descripción</th>
                            <th class="min-w-120px text-dark">Marca</th>
                            <th class="min-w-120px text-dark">Estado</th>
                            <th class="min-w-120px text-dark">Precio compra</th>
                            <th class="min-w-120px text-dark">Precio venta</th>
                            <th class="min-w-120px text-dark">Stock</th>
                            <th class="min-w-120px text-dark">Stock Alerta</th>
                            <th class="min-w-120px text-dark">Fecha Ven.</th>
                            <th class="text-dark">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="fw-6 fw-bold text-gray-600">
                    </tbody>
                </table>
                <div id="pagination_link"></div>
            </div>
        </div>
    </div>

   
@endsection()
@push('script')
<script>
    $(document).ready(async function (){
        loadTableProductos('json');
        $('#kt_modal_create_productos').modal({ backdrop: 'static', keyboard: false });
        $("#fecha_venc_alerta, #fecha_venc").flatpickr({
            // enableTime: true,
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],         
                }, 
                months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });
        $(document).on("click", "#kt_btn_new_producto", function(){
            if (validateFormProducto("#kt_modal_create_producto_form")){
                return;
            }
            Swal.fire({
                buttonsStyling:!1,
                showDenyButton: true,
                //title: '¿Estas seguro que desea guardar el producto?',
                text: "¿Estas seguro que desea guardar el producto?",
                icon: 'question',
                confirmButtonText: 'Confirmar',
                denyButtonText: 'Cancelar',
                reverseButtons: true,
                customClass:{
                    confirmButton:"btn btn-dark-degradate border-radius-30",
                    denyButton:"btn btn-light-degradate border-radius-30",
                }
            }).then((function(result){
                if(!result.isDenied){
                    registrarProducto();
                }
            }));
            
        });
        async function registrarProducto(){
            $(".empty_error").empty();
            var categoria_id   = $("select[name='categoria_id']").val();
            var laboratorio_id = $("select[name='laboratorio_id']").val();
            var unidad_medida  = $("select[name='unidad_medida']").val();
            const data = new FormData();
            var _estado = $("input[name='estado']");
            data.append('_token', $("input[name='_token']").val());
            data.append('codigo', $("input[name='codigo']").val());
            data.append('descripcion', $("input[name='descripcion']").val());
            data.append('marca', $("input[name='marca']").val());
            data.append('categoria_id', categoria_id=="0"?'':categoria_id);
            data.append('laboratorio_id', laboratorio_id=="0"?'':laboratorio_id);
            data.append('sintomas', $("input[name='sintomas']").val());
            data.append('registro_sanitario', $("input[name='registro_sanitario']").val());
            data.append('unidad_medida', unidad_medida=="0"?'':unidad_medida);
            data.append('numero_lote', $("input[name='numero_lote']").val());
            data.append('precio_compra', $("input[name='precio_compra']").val());
            data.append('precio_venta_min', $("input[name='precio_venta_min']").val());
            data.append('precio_venta_max', $("input[name='precio_venta_max']").val());
            data.append('stock', $("input[name='stock']").val());
            data.append('stock_min', $("input[name='stock_min']").val());
            data.append('stock_alerta', $("input[name='stock_alerta']").val());
            data.append('fecha_venc', $("input[name='fecha_venc']").val());
            data.append('fecha_venc_alerta', $("input[name='fecha_venc_alerta']").val());
            data.append('estado', _estado.is(':checked')?1:0 );
            data.append('id', $("#idProducto").val());
            beforeSendBtnLoad("#kt_btn_new_producto");
            const response = await fetch( APP_URL + '/product/register', {
                method: 'POST',
                body: data
            }).then(async (response)=> {
                const rest = await response.json();
                const estado = rest.estado;
                beforeSendBtnLoad('#kt_btn_new_producto',false);
                if(rest.response=="errorValidacion"){
                    const errorClean = rest.data;
                    var errorText = '';
                    $.each(errorClean, function( index, value ){
                        errorText = value;
                    });
                    Toast.fire({
                        icon: rest.icono,
                        title: errorText
                    });
                    return;
                }
                if(rest.response=="empty"){
                    const errorClean = rest.data;
                    $.each(errorClean, function( index, value ){
                        if (index != undefined) {
                            $('#error_'+index).append(value);
                        }
                    });
                }
                if(rest.response=="success"){
                    loadTableProductos('json');
                    emptyForm();
                }
                Toast.fire({
                    icon: rest.icono,
                    title: rest.message
                });
            }).catch((error) => {
                console.log(error);
                Toast.fire({
                    icon: 'error',
                    title: APP_ERROR_SERVER
                });
            });
        }
       
        function emptyForm(){
            $(".empty_error").empty();
            $("#kt_modal_create_producto_form")[0].reset()
            //$("select[name='categoria_id']").select2().val(0);
            $("select[name='laboratorio_id']").val(0).trigger('change.select2');
            $("select[name='categoria_id']").val(0).trigger('change.select2');
            $('#kt_modal_create_productos').modal('hide');
            $("#idProducto").val('');
        }
        $(document).on("click", "#kt_modal_productos_cancel, #modal_close_Producto", function(){
            emptyForm(); 
        });
        function loadTableProductos(from) {
            var json_data_venta = {
                "from": from,
                "_token": $("input[name='_token']").val(),
            }
            /*lista con datatables*/
            var table = $('#table_producto').DataTable({
                "destroy": true,
                //"responsive": true,
                "deferRender": true,
                "autoWidth": false,
                "dom": 'lfrtip',
                searching: true,
                ordering:  true,
                "bPaginate": true,
                "language": {
                    "url": "{{asset('assets/plugins/custom/datatables/es_es.json')}}"
                },
                "ajax": {
                    "url": APP_URL+"/product/listar",
                    "dataType": "json",
                    "data": json_data_venta,
                    "dataSrc": "data",
                    "type": "post",
                },
                "columns": [
                    {data: null},
                    {data: 'codigo'},
                    {data: 'descripcion'},
                    { data: 'marca'},
                    { data: 'estado'},
                    { data: 'precio_compra'},
                    { data: 'precio_venta_min'},
                    { data: 'stock'},
                    { data: 'stock_min'},
                    { data: 'fecha_venc'},
                    { data: 'html'}
                ],
                "columnDefs": [{
                    "targets": 0,
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        $('.dataTables_filter input').removeClass('form-control-sm').addClass('form-control-lg');
                        return `<a>${data.IdCounter}</a>`; 
                    }
                }],
            }).on('order.dt search.dt', function () {
                KTMenu.createInstances();
            }).on('length.dt page.dt', function () {
                setInterval(function () {
                    KTMenu.createInstances();
                }, 500)
            }).draw();
            
        }
        function btnOpcionesProducto(opcion){
            $('#kt_modal_create_productos').modal('show');
            $('#kt_modal_btn_opciones').show();
            if(opcion=="registro"){
                $('#kt_btn_new_producto .indicator-label').text('Guardar producto');
                $("#kt_modal_create_producto_form input, #kt_modal_create_producto_form select").prop("disabled", false);
            }else if(opcion=="ver"){
                $('#kt_modal_btn_opciones').hide();
                $("#kt_modal_create_producto_form input, #kt_modal_create_producto_form select").prop("disabled", true);
            }else if(opcion=="actualizar"){
                $('#kt_btn_new_producto .indicator-label').text('Actualizar producto');
                $("#kt_modal_create_producto_form input, #kt_modal_create_producto_form select").prop("disabled", false);
            }
        }
        $(document).on("click", "#modal_show_producto", function(){
            btnOpcionesProducto('registro');
        });
        $(document).on("keyup", "input[name='stock']", function(){
            $("#idStockRegistro").val($(this).val());
        });
        $(document).on("click", ".cl-ver-detalle", function(event){
            var _id = $(this).parent().parent().data('id');
            event.preventDefault();
            btnOpcionesProducto('ver');         
            $.ajax({
                url: '{{url('producto/producto-by-id')}}',
                type: 'POST',
                data: {
                    "_token": $("input[name='_token']").val(),
                    'id':_id
                },
                beforeSend: function(data){
                },
                success: function(rest){
                    if (rest.response=='error'){
                        Toast.fire({
                            icon: rest.icono,
                            title: rest.message
                        });
                        return;
                    }
                    dataProducto(rest.data);
                },
                error: function (jqXHR) {
                    console.log(jqXHR.responseJSON);
                    Toast.fire({
                        icon: 'error',
                        title: APP_ERROR_SERVER
                    });
                }
            });
        });
        $(document).on("click", ".cl-actualizar", function(event){
            var _id = $(this).parent().parent().data('id');
            event.preventDefault();
            btnOpcionesProducto('actualizar');
            $.ajax({
                url: '{{url('producto/producto-by-id')}}',
                type: 'POST',
                data: {
                    "_token": $("input[name='_token']").val(),
                    'id':_id
                },
                beforeSend: function(data){
                },
                success: function(rest){
                    if (rest.response=='error'){
                        Toast.fire({
                            icon: rest.icono,
                            title: rest.message
                        });
                        return;
                    }
                    dataProducto(rest.data);
                },
                error: function (jqXHR) {
                    console.log(jqXHR.responseJSON);
                    Toast.fire({
                        icon: 'error',
                        title: APP_ERROR_SERVER
                    });
                }
            });
        });
        $(document).on("click", ".cl-estado-actualizar", function(event){
            event.preventDefault();
            var _id = $(this).parent().parent().data('id');
            var _estado_change = $(this).data('estado_change');
            var _this = $(this);
            var _htmlEstado='<span class="badge badge-light-danger fs-7 fw-bolder"><i class="stepper-check fas text-danger fa-circle px-2"></i> No disponible</span>';
            if(_estado_change==1){
                _htmlEstado='<span class="badge badge-light-success fs-7 fw-bolder"><i class="stepper-check fas text-success fa-check px-2"></i>Disponible</span>';
            }
            $.ajax({
                url: '{{url('producto/producto-actualizar-estado')}}',
                type: 'POST',
                data: {
                    "_token": $("input[name='_token']").val(),
                    'id':_id,
                    'estado':_estado_change,
                },
                beforeSend: function(data){
                },
                success: function(rest){
                    if (rest.response=='success'){
                        _this.parent().parent().parent().parent().parent().children("td").eq(4).html(_htmlEstado);
                        _this.data('estado_change', _estado_change==1?0:1);
                        _this.children(".svg-icon").html(_estado_change==1?'<i class="stepper-check fas fa-circle"></i>':'<i class="stepper-check fas fa-check"></i>');
                        _this.children(".text-estado").html(_estado_change==1?'No Disponible':'Disponible');
                        
                    }
                    Toast.fire({
                        icon: rest.icono,
                        title: rest.message
                    });                    
                },
                error: function (jqXHR) {
                    console.log(jqXHR.responseJSON);
                    Toast.fire({
                        icon: 'error',
                        title: APP_ERROR_SERVER
                    });
                }
            });
        });
        function dataProducto(data){
            $("select[name='categoria_id']").val(data.categoria_id).trigger('change.select2');
            $("select[name='laboratorio_id']").val(data.laboratorio_id).trigger('change.select2');
            $("select[name='unidad_medida']").val(data.unidad_medida).trigger('change.select2');
            $("input[name='codigo']").val(data.codigo)
            $("input[name='descripcion']").val(data.descripcion)
            $("input[name='marca']").val(data.marca)
            $("input[name='sintomas']").val(data.sintomas)
            $("input[name='registro_sanitario']").val(data.registro_sanitario)
            $("input[name='numero_lote']").val(data.numero_lote)
            $("input[name='precio_compra']").val(data.precio_compra)
            $("input[name='precio_venta_min']").val(data.precio_venta_min)
            $("input[name='precio_venta_max']").val(data.precio_venta_max)
            $("input[name='stock']").val(data.stock)
            $("input[name='stock_min']").val(data.stock_min)
            $("input[name='stock_alerta']").val(data.stock_alerta)
            $("#idStockRegistro").val(data.stock_registro)
            $("input[name='fecha_venc']").val(data.fecha_venc)
            $("input[name='fecha_venc_alerta']").val(data.fecha_venc_alerta)
            $("#idProducto").val(data.id)
            $("input[name='estado']").prop("checked", data.estado ==1 ? true:false);
        }

        ///************************
         // Variables
       //const inputFile = document.querySelector('#subirImg');
       const image = document.querySelector('#showImg');
        async function encodeFileAsBase64URL(file) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.addEventListener('loadend', () => {
                    resolve(reader.result);
                });
                reader.readAsDataURL(file);
            });
        };

        //inputFile.addEventListener('input', async (event) => {
        
        $(document).on("input", "#subirImg12", async function(event){
            contadorImg1=contadorImg1+1;
            const inputFile = document.querySelector('#subirImg');
            const IdUploadImg = $("#IdUploadImg").html();
            const createElemntoImg = document.createElement("div");
            createElemntoImg.classList.add('col-md-2');
            createElemntoImg.classList.add('col-sm-3');
            createElemntoImg.classList.add('fv-row');
            createElemntoImg.setAttribute("id", "IdUploadImg");
            createElemntoImg.innerHTML = IdUploadImg;
            const base64URL = await encodeFileAsBase64URL(inputFile.files[0]);
            var classActiveCheck = '';
            if (contadorImg1>=1 && contadorImg1<=4){
                classActiveCheck = 'active';
            }
            //image.setAttribute('style', 'background-image: url('+ base64URL+')');
            const htmlContenImg=`<div class="col-md-2 col-sm-3 fv-row position-relative ki_images_select" >
                            <div class="position-absolute cls_check_photo ${classActiveCheck}" data-estado="${classActiveCheck}" > 
                                <i class="bi bi-check2 fs-2x"></i>
                            </div>
                            <div  class="btn btn-outline btn-outline-dashed btn-outline-default w-100 active p-0 image-input" id="kt_modal_create_campaign_duration_all">
                                <div class="image-input-wrapper w-100 h-100px background-size-cover" style="border-radius: 0.475rem 0.475rem 0 0;background-image: url(${base64URL})" ></div> 
                                <button style="border-radius: 0 0 0.475rem 0.475rem;" type="button" class="btn btn-sm btn-dark w-100 tk_delete_image_final_sesion" >
                                    Eliminar
                               </button>
                            </div>
                        </div>`;
            $("#kt_list_images").append(htmlContenImg);
            document.getElementById("kt_list_images").append(createElemntoImg);
            $("#IdUploadImg").remove();
            validar4Images()
        });
    })
</script>
@endpush
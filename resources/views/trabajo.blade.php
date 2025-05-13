@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="card">
            <form action="{{ route('plan.trabajo.store') }}" method="post" id="form-solicitud">

                @csrf

                <div class="card-header d-flex">
                    <h5 class="my-auto me-auto">Plan de Trabajo</h5>
                    <a class="btn btn-sm btn-secondary me-2" href="{{ route('index') }}">Volver</a>
                    <button class="btn btn-sm btn-success" type="submit" id="btnGenerarSolicitud">Generar</button>
                </div>

                <div class="card-body bg-body-tertiary">

                    <div class="alert alert-warning p-3">
                        <p class="m-0"><strong>Importante!</strong> El valor del semestre por defecto es Octavo semestre.
                            En caso de ser alumno irregular deberá modificar el documento Word</p>
                    </div>

                    <div class="alert alert-warning p-3 mt-3">
                        <p class="m-0"><strong>Importante!</strong> Deberá llenar sus actividades en el documento Word</p>
                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos personales</h5>

                    <div class="row mb-4">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_completo">Nombre Completo:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_completo"
                                id="nombre_completo" placeholder="Nombre completo...">
                            @error('nombre_completo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="carrera" class="form-label">Seleccionar Carrera:</label>
                            <select class="form-select input-llenar" name="carrera" id="carrera">
                                <option value="" selected>Seleccionar...</option>

                                @foreach ($careers as $career)
                                    <option value="{{ $career->name }}">{{ $career->name }}</option>
                                @endforeach

                            </select>
                            @error('carrera')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="numero_control">Número de Control:</label>
                            <input class="form-control input-llenar" type="text" name="numero_control"
                                id="numero_control" placeholder="Número de Control...">
                            <span class="text-secondary fs-6">Todas las letras deben ser en Mayúsculas</span>
                            @error('numero_control')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-8">
                            <label class="form-label" for="nombre_programa">Nombre del Programa:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_programa"
                                id="nombre_programa" placeholder="Nombre del Programa...">
                            @error('nombre_programa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos de la Institución</h5>

                    <div class="row mb-4">

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_empresa">Nombre de la Institución/Empresa:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_empresa"
                                id="nombre_empresa" placeholder="Nombre de la Institución/Empresa...">
                            @error('nombre_empresa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="direccion_empresa">Dirección de la Institución/Empresa:</label>
                            <input class="form-control input-llenar" type="text" name="direccion_empresa"
                                id="direccion_empresa" placeholder="Dirección de la Institución/Empresa...">
                            @error('direccion_empresa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_contacto">Nombre del contacto:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_contacto"
                                id="nombre_contacto" placeholder="Nombre del Contacto...">
                            @error('nombre_contacto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="puesto_contacto">Puesto del Contacto:</label>
                            <input class="form-control input-llenar" type="text" name="puesto_contacto"
                                id="puesto_contacto" placeholder="Puesto del Contacto...">
                            @error('puesto_contacto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_area">Área:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_area" id="nombre_area"
                                placeholder="Área...">
                            @error('nombre_area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="correo_contacto">Correo electrónico del Contacto:</label>
                            <input class="form-control input-llenar" type="email" name="correo_contacto"
                                id="correo_contacto" placeholder="Correo electrónico del Contacto...">
                            @error('correo_contacto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="telefono_contacto">Teléfono del Contacto:</label>
                            <input class="form-control input-llenar" type="tel" name="telefono_contacto"
                                id="telefono_contacto" placeholder="Teléfono del Contacto...">
                            @error('telefono_contacto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="horarios_contacto">Horarios del Contacto:</label>
                            <input class="form-control input-llenar" type="text" name="horarios_contacto"
                                id="horarios_contacto" placeholder="XX a XX Horas">
                            @error('horarios_contacto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <!--

                    <h5 class="mb-2 text-center text-uppercase">Calendarización de las Actividades durante el Servicio</h5>

                    <div class="row mb-3">
                        <div class="col-md-6 d-flex">
                            <input class="form-control me-2" type="number" placeholder="N° de Actividades..."
                                id="numero_actividades" value="1" min="1" max="12">
                            <button class="btn btn-outline-success" type="button" id="btn_agregar_actividades">Agregar</button>
                        </div>
                    </div>

                    <div id="contenedor_tareas"></div>

                    -->







                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection

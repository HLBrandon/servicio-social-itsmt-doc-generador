@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="card">
            <form action="{{ route('solicitud.store') }}" method="post" id="form-solicitud">

                @csrf

                <div class="card-header d-flex">
                    <h5 class="my-auto me-auto">ANEXO XVIII</h5>
                    <a class="btn btn-sm btn-secondary me-2" href="{{ route('index') }}">Volver</a>
                    <button class="btn btn-sm btn-success" type="submit" id="btnGenerarSolicitud">Generar</button>
                </div>

                <div class="card-body bg-body-tertiary">

                    <div class="alert alert-warning p-3">
                        <p class="m-0"><strong>Importante!</strong> El valor del semestre por defecto es Octavo semestre. En caso de ser alumno irregular deberá modificar el documento Word</p>
                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos personales</h5>

                    <div class="row mb-4">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_completo">Nombre Completo:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_completo" id="nombre_completo"
                                placeholder="Nombre completo...">
                            @error('nombre_completo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-select input-llenar" name="sexo" id="sexo">
                                <option value="" selected>Seleccionar...</option>
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                            </select>
                            @error('sexo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="telefono">Teléfono:</label>
                            <input class="form-control input-llenar" type="tel" name="telefono" id="telefono"
                                placeholder="Número de teléfono...">
                            @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="correo_institucional">Correo Institucional:</label>
                            <input class="form-control input-llenar" type="email" name="correo_institucional" id="correo_institucional"
                                placeholder="Correo Institucional...">
                            @error('correo_institucional')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="domicilio">Dirección de Domicilio:</label>
                            <input class="form-control input-llenar" type="text" name="domicilio" id="domicilio"
                                placeholder="Domicilio...">
                            @error('domicilio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos Escolares</h5>

                    <div class="row mb-4">

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="numero_control">Número de Control:</label>
                            <input class="form-control input-llenar" type="text" name="numero_control" id="numero_control"
                                placeholder="Número de Control...">
                            <span class="text-secondary fs-6">Todas las letras deben ser en Mayúsculas</span>
                            @error('numero_control')
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

                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos del Programa de Servicio Social</h5>

                    <div class="row mb-4">

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="dependencia">Dependencia oficial:</label>
                            <input class="form-control input-llenar" type="text" name="dependencia" id="dependencia"
                                placeholder="Dependencia oficial...">
                            @error('dependencia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="titular">Titular de la Dependencia:</label>
                            <input class="form-control input-llenar" type="text" name="titular" id="titular"
                                placeholder="Titular de la Dependencia...">
                            @error('titular')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="puesto">Puesto de la Dependencia:</label>
                            <input class="form-control input-llenar" type="text" name="puesto" id="puesto"
                                placeholder="Puesto de la Dependencia...">
                            @error('puesto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_programa">Nombre del Programa:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_programa" id="nombre_programa"
                                placeholder="Nombre del Programa...">
                            @error('nombre_programa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="actividades">Programa de Actividades</label>
                            <textarea placeholder="Actividades..." class="form-control input-llenar" name="actividades" id="actividades" rows="8"></textarea>
                            @error('actividades')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="modalidad" class="form-label">Modalidad:</label>
                            <select class="form-select input-llenar" name="modalidad" id="modalidad">
                                <option value="" selected>Seleccionar...</option>
                                <option value="1">Interno</option>
                                <option value="2">Externo</option>
                            </select>
                            @error('modalidad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="tipo_programa" class="form-label">Tipo de Programa:</label>
                            <select class="form-select input-llenar" name="tipo_programa" id="tipo_programa">
                                <option value="" selected>Seleccionar...</option>

                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('tipo_programa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <input disabled hidden class="form-control input-llenar" type="text" placeholder="Tipo de Programa..."
                                name="otro_programa" id="otro_programa">
                            @error('otro_programa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <input hidden type="date" value="{{ $period->start_date }}" name="fecha_inicio">
                    <input hidden type="date" value="{{ $period->end_date }}" name="fecha_fin">
                    <input hidden type="date" value="{{ $semester->start_semester }}" name="fecha_inicio_semestre">
                    <input hidden type="date" value="{{ $semester->end_semester }}" name="fecha_fin_semestre">

                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection

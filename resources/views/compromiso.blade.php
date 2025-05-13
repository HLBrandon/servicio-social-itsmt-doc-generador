@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="card">
            <form action="{{ route('compromiso.store') }}" method="post" id="form-solicitud">

                @csrf

                <div class="card-header d-flex">
                    <h5 class="my-auto me-auto">ANEXO XX</h5>
                    <a class="btn btn-sm btn-secondary me-2" href="{{ route('index') }}">Volver</a>
                    <button class="btn btn-sm btn-success" type="submit" id="btnGenerarSolicitud">Generar</button>
                </div>

                <div class="card-body bg-body-tertiary">

                    <div class="alert alert-warning p-3">
                        <p class="m-0"><strong>Importante!</strong> El valor del semestre por defecto es Octavo semestre.
                            En caso de ser alumno irregular deberá modificar el documento Word</p>
                    </div>

                    <h5 class="mb-2 text-center text-uppercase">Datos del Estudiante</h5>

                    <div class="row mb-4">

                        <!-- Nombre completo del estudiante -->
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nombre_completo">Nombre Completo:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_completo"
                                id="nombre_completo" placeholder="Nombre completo...">
                            @error('nombre_completo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Número de control del estudiante -->
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="numero_control">Número de Control:</label>
                            <input class="form-control input-llenar" type="text" name="numero_control"
                                id="numero_control" placeholder="Número de Control...">
                            <span class="text-secondary fs-6">Todas las letras deben ser en Mayúsculas</span>
                            @error('numero_control')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Telefono del estudiante -->
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="telefono">Teléfono:</label>
                            <input class="form-control input-llenar" type="tel" name="telefono" id="telefono"
                                placeholder="Número de teléfono...">
                            @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Domicilio del estudiante -->
                        <div class="mb-3 col-md-8">
                            <label class="form-label" for="domicilio">Dirección de Domicilio:</label>
                            <input class="form-control input-llenar" type="text" name="domicilio" id="domicilio"
                                placeholder="Domicilio...">
                            @error('domicilio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Seleccionar carrera del estudiante -->
                        <div class="mb-3 col-md-4">
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

                    <h5 class="mb-2 text-center text-uppercase">Datos donde el Estudiante hará el servicio</h5>

                    <div class="row mb-4">

                        <!-- Lugar donde el estudiante hará su servicio -->
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="dependencia">Dependencia u Organismo:</label>
                            <input class="form-control input-llenar" type="text" name="dependencia" id="dependencia"
                                placeholder="Dependencia oficial...">
                            @error('dependencia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Domicilio del lugar donde el estudiante hará el servicio -->
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="domicilio_dependencia">Dirección de la Dependencia:</label>
                            <input class="form-control input-llenar" type="text" name="domicilio_dependencia"
                                id="domicilio_dependencia" placeholder="Domicilio...">
                            @error('domicilio_dependencia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nombre del responsable acargo -->
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="nombre_responsable">Nombre del responsable:</label>
                            <input class="form-control input-llenar" type="text" name="nombre_responsable"
                                id="nombre_responsable" placeholder="Responsable del Programa...">
                            @error('nombre_responsable')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <input hidden type="date" value="{{ $period->start_date }}" name="fecha_inicio">
                    <input hidden type="date" value="{{ $period->end_date }}" name="fecha_fin">

                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection

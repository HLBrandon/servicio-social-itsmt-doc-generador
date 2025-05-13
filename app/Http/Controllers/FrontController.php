<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompromisoStoreRequest;
use App\Http\Requests\SolicitudStoreRequest;
use App\Models\Career;
use App\Models\Period;
use App\Models\Program;
use App\Models\Semester;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class FrontController extends Controller
{

    public $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    // Funcion para mostrar la vista de inicio
    public function index()
    {
        return view("welcome");
    }

    public function solicitudCreate()
    {

        $careers = Career::all("name");
        $programs = Program::all();
        $period = Period::first();
        $semester = Semester::first();

        return view("solicitud", compact("careers", "programs", "period", "semester"));
    }

    public function solicitudStore(SolicitudStoreRequest $request)
    {
        // Copia el archivo document_original.xml y lo renombra como document.xml
        $originalPath = public_path('assets/anexo-xviii/word/document_old.xml');
        $temporaryPath = public_path('assets/anexo-xviii/word/document.xml');
        copy($originalPath, $temporaryPath);

        // Lee el contenido del document.xml dentro de la carpeta word
        $documentXml = file_get_contents($temporaryPath);

        // Llena los valores de los Datos personales
        $documentXml = str_replace("txt_alumno", $request->nombre_completo, $documentXml);
        $documentXml = str_replace('txt_sexo', $request->sexo, $documentXml);
        $documentXml = str_replace('txt_telefono', $request->telefono, $documentXml);
        $documentXml = str_replace('txt_correo', $request->correo_institucional, $documentXml);
        $documentXml = str_replace('txt_domicilio', $request->domicilio, $documentXml);

        // Llena los datos de la Escolaridad
        $documentXml = str_replace('txt_control', $request->numero_control, $documentXml);
        $documentXml = str_replace('txt_carrera', $request->carrera, $documentXml);

        $mesInicio = $this->fecha_mes(date("m", strtotime($request->fecha_inicio_semestre)));
        $mesFin = $this->fecha_mes(date("m", strtotime($request->fecha_fin_semestre)));
        $anioFin =  date("Y", strtotime($request->fecha_fin_semestre));
        $periodo = $mesInicio . " - " . $mesFin . " " . $anioFin;

        $documentXml = str_replace('txt_periodo', $periodo, $documentXml);
        $documentXml = str_replace('txt_semestre', "8ª", $documentXml);

        // Llena los datos del Programa de Servicio Social
        $documentXml = str_replace('txt_dependencia', $request->dependencia, $documentXml);
        $documentXml = str_replace('txt_titular_dependencia', $request->titular, $documentXml);
        $documentXml = str_replace('txt_puesto_titular', $request->puesto, $documentXml);
        $documentXml = str_replace('txt_nombre_programa', $request->nombre_programa, $documentXml);
        $documentXml = str_replace('txt_i', ($request->modalidad == 1) ? "X" : "", $documentXml);
        $documentXml = str_replace('txt_e', ($request->modalidad == 2) ? "X" : "", $documentXml);
        $documentXml = str_replace('txt_fecha_inicio', date("d/m/Y", strtotime($request->fecha_inicio)), $documentXml);
        $documentXml = str_replace('txt_fecha_fin', date("d/m/Y", strtotime($request->fecha_fin)), $documentXml);
        $documentXml = str_replace('txt_programa_actividades', $request->actividades, $documentXml);

        // Tipo de Programa
        $documentXml = str_replace('x_adul', ($request->tipo_programa == 1) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_civi', ($request->tipo_programa == 2) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_sus', ($request->tipo_programa == 3) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_com', ($request->tipo_programa == 4) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_cul', ($request->tipo_programa == 5) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_salud', ($request->tipo_programa == 6) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_depo', ($request->tipo_programa == 7) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_amb', ($request->tipo_programa == 8) ? "X" : " ", $documentXml);
        $documentXml = str_replace('x_otr', ($request->tipo_programa == 9) ? "X" : " ", $documentXml);
        $documentXml = str_replace('txt_otro_des', ($request->tipo_programa == 9) ? "(" . $request->otro_programa . ")" : "", $documentXml);

        // Guarda los cambios en el archivo original
        file_put_contents($temporaryPath, $documentXml);

        // Crear el archivo ZIP
        $zip = new ZipArchive();
        $filename = 'anexo_xviii_' . time() . ".docx";
        $filePath = public_path($filename);

        if ($zip->open($filePath, ZipArchive::CREATE) === TRUE) {
            // Agregar el archivo [Content_Types].xml
            $zip->addFile(public_path('assets/anexo-xviii/[Content_Types].xml'), '[Content_Types].xml');

            // Agregar carpetas específicas (_rels/, docProps/, word/)
            $this->addFolderToZip($zip, public_path('assets/anexo-xviii/_rels'), '_rels');
            $this->addFolderToZip($zip, public_path('assets/anexo-xviii/docProps'), 'docProps');
            $this->addFolderToZip($zip, public_path('assets/anexo-xviii/word'), 'word');

            // Cerrar el archivo ZIP
            $zip->close();

            // Eliminar el archivo temporal document.xml
            unlink($temporaryPath);

            // Retornar el archivo para descarga
            return response()->download($filePath)->deleteFileAfterSend(true);
        }
    }

    public function compromisoCreate()
    {
        $careers = Career::all("name");
        $programs = Program::all();
        $period = Period::first();

        return view("compromiso", compact("careers", "period"));
    }

    public function compromisoStore(CompromisoStoreRequest $request)
    {
        // Copia el archivo document_original.xml y lo renombra como document.xml
        $originalPath = public_path('assets/anexo-xx/word/document_old.xml');
        $temporaryPath = public_path('assets/anexo-xx/word/document.xml');
        copy($originalPath, $temporaryPath);

        // Lee el contenido del document.xml dentro de la carpeta word
        $documentXml = file_get_contents($temporaryPath);

        // Llena los valores de los Datos personales
        $documentXml = str_replace("txt_nombre_alumno", $request->nombre_completo, $documentXml);
        $documentXml = str_replace("txt_numero_control", $request->numero_control, $documentXml);
        $documentXml = str_replace('txt_domicilio_alumno', $request->domicilio, $documentXml);
        $documentXml = str_replace('txt_telefono_alumno', $request->telefono, $documentXml);
        $documentXml = str_replace('txt_carrera', $request->carrera, $documentXml);

        // Llenar los valores de los datos donde el estudiante hará el servicio
        $documentXml = str_replace('txt_dependencia', $request->dependencia, $documentXml);
        $documentXml = str_replace('txt_domicilio_dependencia', $request->domicilio_dependencia, $documentXml);
        $documentXml = str_replace('txt_nombre_responsable', $request->nombre_responsable, $documentXml);

        // Fecha de inicio y termino del servicio
        $documentXml = str_replace('txt_fecha_inicio', date("d/m/Y", strtotime($request->fecha_inicio)), $documentXml);
        $documentXml = str_replace('txt_fecha_fin', date("d/m/Y", strtotime($request->fecha_fin)), $documentXml);

        // Fecha en que fue llenado el documento
        $documentXml = str_replace('txt_dia', date("d"), $documentXml);
        $documentXml = str_replace('txt_mes', $this->fecha_mes(date("m")), $documentXml);
        $documentXml = str_replace('txt_anio', date("Y"), $documentXml);

        // Guarda los cambios en el archivo original
        file_put_contents($temporaryPath, $documentXml);

        // Crear el archivo ZIP
        $zip = new ZipArchive();
        $filename = 'anexo_xx_' . time() . ".docx";
        $filePath = public_path($filename);

        if ($zip->open($filePath, ZipArchive::CREATE) === TRUE) {
            // Agregar el archivo [Content_Types].xml
            $zip->addFile(public_path('assets/anexo-xx/[Content_Types].xml'), '[Content_Types].xml');

            // Agregar carpetas específicas (_rels/, docProps/, word/)
            $this->addFolderToZip($zip, public_path('assets/anexo-xx/_rels'), '_rels');
            $this->addFolderToZip($zip, public_path('assets/anexo-xx/docProps'), 'docProps');
            $this->addFolderToZip($zip, public_path('assets/anexo-xx/word'), 'word');

            // Cerrar el archivo ZIP
            $zip->close();

            // Eliminar el archivo temporal document.xml
            unlink($temporaryPath);

            // Retornar el archivo para descarga
            return response()->download($filePath)->deleteFileAfterSend(true);
        }
    }

    public function planTrabajoCreate()
    {
        $careers = Career::all("name");
        $programs = Program::all();
        $period = Period::first();
        $semester = Semester::first();

        return view("trabajo", compact("careers", "programs", "period", "semester"));
    }

    public function planTrabajoStore(Request $request)
    {
        
    }

    public function fecha_mes(int $num)
    {
        if (1 > $num || $num > 7) {
            return "Error";
        }
        return $this->mes[$num - 1];
    }

    private function addFolderToZip($zip, $folder, $destination)
    {
        $dir = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new RecursiveIteratorIterator($dir);

        foreach ($iterator as $file) {
            if (!$file->isDir()) {
                // Ruta absoluta del archivo
                $filePath = $file->getRealPath();
                // Ajustar la ruta relativa para que solo incluya desde la carpeta base (p. ej., _rels, docProps, word)
                $relativePath = $destination . '/' . substr($filePath, strlen(realpath($folder)) + 1);
                // Agregar archivo al ZIP
                $zip->addFile($filePath, $relativePath);
            }
        }
    }
}


const contador = 0;

$(document).on("change", "#tipo_programa", function (e) {
    e.preventDefault();

    let tipo_programa = parseInt($(this).val());

    console.log(tipo_programa);


    if (tipo_programa == 9) {
        // Hacer visible al input
        $("#otro_programa").removeAttr('hidden');
        // Activiar el input
        $('#otro_programa').prop('disabled', false);
        return;
    }

    $('#otro_programa').attr("hidden", true);
    $('#otro_programa').prop('disabled', true);
});

$("#btnGenerarSolicitud").click(function (e) {
    e.preventDefault();
    
    document.getElementById('form-solicitud').submit();
    
    $(".input-llenar").val("");

});

$("#btn_agregar_actividades").click(function (e) { 
    e.preventDefault();

    let numero_actividades = +($("#numero_actividades").val());
    let tmp = ``;

    for (let index = 1; index <= numero_actividades; index++) {
        
        tmp += `
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 mb-3 mb-lg-0">
                        <textarea class="form-control" rows="3" placeholder="Actividad..." name="actividad[${index}][tarea]"></textarea>
                    </div>
                    <div class="col-md-7 my-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_ene_${index}"
                                value="Ene" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_ene_${index}">Ene</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_feb_${index}"
                                value="Feb" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_feb_${index}">Feb</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_mar_${index}"
                                value="Mar" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_mar_${index}">Mar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_abr_${index}"
                                value="Abr" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_abr_${index}">Abr</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_may_${index}"
                                value="May" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_may_${index}">May</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_jun_${index}"
                                value="Jun" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_jun_${index}">Jun</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_jul_${index}"
                                value="Jul" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_jul_${index}">Jul</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_ago_${index}"
                                value="Ago" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_ago_${index}">Ago</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_sep_${index}"
                                value="Sep" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_sep_${index}">Sep</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_oct_${index}"
                                value="Oct" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_oct_${index}">Oct</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_nov_${index}"
                                value="Nov" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_nov_${index}">Nov</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check_dic_${index}"
                                value="Dic" name="actividad[${index}][meses][]">
                            <label class="form-check-label" for="check_dic_${index}">Dic</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        `;
        
    }

    $("#contenedor_tareas").html(tmp);

});
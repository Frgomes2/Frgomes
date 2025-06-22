<?php

function alertCertificado($certificado, $nivel)
{

    $msg = ['danger' => "Certificado vencido em ", 'warning' => 'Verificar certificado expiração em '];
    $html = "<div class='row'>
                     <div class='col'>
                         <div class='alert alert-$nivel alert-dismissible fade show' role='alert''>
                             <p style='margin: 0;'><b>Alerta Certificado:</b> ".$msg[$nivel] . format_data($certificado) . "</p>
                             <button id='closeAlert' type='button' class='close' data-dismiss='alert' data-tipo='certificado' data-nivel='$nivel' aria-label='Close' data->
                             <span aria-hidden='true'>&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>";
    return ($html);
}

function alertRp($nivel)
{
    $html = "<div class='row'>
                     <div class='col'>
                         <div class='alert alert-$nivel alert-dismissible fade show' role='alert''>
                             <p style='margin: 0;'><b>Alerta RP:</b> Dados fiscais não informados, não será possível emitir Nota Fiscal</p>
                             <button id='closeAlert' type='button' class='close' data-dismiss='alert' data-tipo='rp' data-nivel='$nivel' aria-label='Close' data->
                             <span aria-hidden='true'>&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>";
    return ($html);
}

function alertRpApi($nivel)
{
    $html = "<div class='row'>
                     <div class='col'>
                         <div class='alert alert-$nivel alert-dismissible fade show' role='alert''>
                             <p style='margin: 0;'><b>Alerta RP:</b> Falha de comunicação com o sistema de emissão de Notas Fiscais </p>
                             <button id='closeAlert' type='button' class='close' data-dismiss='alert' data-tipo='rp' data-nivel='$nivel' aria-label='Close' data->
                             <span aria-hidden='true'>&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>";
    return ($html);
}

function alertPrinter($status, $query_date_hash, $message_hash)
{
    $message = $status['message'];
    $level = substr($status['level'], 5);

    $html = "<div class='row'>
                        <div class='col'>
                            <div class='alert alert-$level alert-dismissible fade show' role='alert'>
                                <p style='margin: 0;'><b>Alerta Impressora:</b> $message.</p>
                                <button id='closeAlert' type='button' class='close' data-dismiss='alert' data-tipo='printer' data-qdate='$query_date_hash' data-message='$message_hash' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>";

    return ($html);
}

function alertPinpad($value)
{
    switch ($value) {
        case 0:
            $message = 'Falha no pagamento';
            break;
        case 2:
            $message = 'Falha ao pegar configurações de split';
            break;
    }

    $html = "<div class='row'>
                     <div class='col'>
                         <div class='alert alert-danger alert-dismissible fade show' role='alert''>
                             <p style='margin: 0;'><b>Alerta Pinpad:</b> " . $message . "</p>
                             <button id='closeAlert' type='button' class='close' data-dismiss='alert' data-tipo='pinpad' data-nivel='danger' aria-label='Close'>
                             <span aria-hidden='true'>&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>";
    return ($html);
}


function alertGeneric($nivel, $title, $text)
{
    $html = "<div class='row'>
                     <div class='col'>
                         <div class='alert alert-".$nivel." alert-dismissible fade show' role='alert'>
                             <p style='margin: 0;'><b>".$title.":</b> ".$text."</p>
                             <button id='closeAlert' type='button' class='close' data-dismiss='alert'  data-nivel='".$nivel."' aria-label='Close' data->
                             <span aria-hidden='true'>&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>";
    return ($html);
}


function setAlertData($key, $value)
{
    $instance =& get_instance();
    $equipament_id = $instance->session->userdata(NAME_SESSION . "EQUIPAMENTO");
    $instance->session->set_userdata($key . $equipament_id, $value);
}

function getHidden($type, $alert_name)
{
    //$type can be Alert, Level, Date
    $instance =& get_instance();
    $equipament_id = $instance->session->userdata(NAME_SESSION . "EQUIPAMENTO");
    if ($instance->session->has_userdata("hidden" . ucfirst($type) . ucfirst($alert_name) . $equipament_id . "")) {
        return $instance->session->userdata("hidden" . ucfirst($type) . ucfirst($alert_name) . $equipament_id . "");
    }
    return false;
}

function createAlert($name, $value)
{
    $instance =& get_instance();
    $equipament_id = $instance->session->userdata(NAME_SESSION . "EQUIPAMENTO");
    $hiddenAlertLevel = getHidden('Level', $name);

    $alert_retorno = '';

    switch ($name) {
        case 'printer':
            $lastPrinter = $instance->printer->getLastequipament($instance->session->userdata(NAME_SESSION . "EQUIPAMENTO"));
            $printerQueryDate = @$lastPrinter->pri_create_at;
            $hiddenAlertDate = getHidden('Date', $name);
            $queryDateHash = hash('md2', $printerQueryDate);
            $abs_level = substr($value['abs_level'], 5);
            $alerts = '';

            foreach ($value['status'] as $status) {

                $messageHash = hash('md2', $status['message']);
                $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $messageHash . $equipament_id);
                if ((!$isClosedInTheSession || ($queryDateHash != $hiddenAlertDate)) && $abs_level != 'success') {

                    $alerts .= alertPrinter($status, $queryDateHash, $messageHash);
                }
            }
            $alert_retorno = $alerts;

            break;

        case 'estoque':
            $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $equipament_id);
            $nivel = $value == 0 ? 'danger' : 'warning';
            if ((!$isClosedInTheSession || ($hiddenAlertLevel && $nivel != $hiddenAlertLevel)) && $value < 3) {

                $alert_retorno = alertEstoque($value, $nivel);
            }
            break;
        case 'pinpad':
            $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $equipament_id);
            if (!$isClosedInTheSession && $value != 1) {
                $alert_retorno = alertPinpad($value);
            }
            break;
        case 'certificado':
            $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $equipament_id);
            if(!is_null($value)){
                $validade = strtotime($value . "-30 days");
                $tomorow = strtotime(date("Y-m-d"));
                if ($validade < $tomorow) {

                    $validade = strtotime($value . "-10 days");
                    $nivel = $validade < $tomorow ? 'danger' : 'warning';
                    if (!$isClosedInTheSession || ($hiddenAlertLevel && $nivel != $hiddenAlertLevel)) {
                        $alert_retorno = alertCertificado($value, $nivel);
                    }
                }
            }
            break;
        case 'rp':

            if ($value == 'P') {
                $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $equipament_id);
                $nivel = 'danger';
                if (!$isClosedInTheSession || ($hiddenAlertLevel && $nivel != $hiddenAlertLevel)) {

                    $alert_retorno = alertRp($nivel);
                }
            }
            break;

        case 'rp_api':
            if ($value == 'I') {
                $isClosedInTheSession = $instance->session->has_userdata('hiddenAlert' . ucfirst($name) . $equipament_id);
                $nivel = 'danger';
                if (!$isClosedInTheSession || ($hiddenAlertLevel && $nivel != $hiddenAlertLevel)) {
                    $alert_retorno = alertRpApi($nivel);
                }
            }
            break;

        case 'emissao_nota':

            $part = explode("|", $value);

            if ($part[1] == 0) {
                /* Aviso laranja*/
                $alert_retorno = alertGeneric('warning', 'Alerta RP', 'Equipamento realizando venda sem emissão de nota fiscal');

            } elseif ($part[0] == "P") {
                /* Alerta Vermeho */
                $alert_retorno = alertGeneric('danger', 'Alerta RP', 'Dados fiscais não cadastrados, venda bloqueada');
            }

            break;
        default:
            break;
    }

    return $alert_retorno;

}

?>
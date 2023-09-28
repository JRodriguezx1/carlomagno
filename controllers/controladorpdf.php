<?php


namespace Controllers;

use Classes\Email;
use Dompdf\Dompdf;
use Model\estud_grupo; // namespace\clase hija
use Model\estudiantes;
use Model\grupos;
use Model\programas;
use Model\pagos;
use MVC\Router;  // namespace\clase
 
class controladorpdf{

    public static function print_pago(Router $router){
        session_start();
        isauth();
        $id = $_GET['id']; //id del pago
        if(!is_numeric($id))return;

        $pago = pagos::idregistros('id', $id); //idmatricula = id de estud_grupo
        $pago[0]->idestudiante = estud_grupo::uncampo('id', $pago[0]->idmatricula, 'idestudiante');
        $pago[0]->estudiante = estudiantes::idregistros('id', $pago[0]->idestudiante); //datos basicos de estudiante
        $pago[0]->idgrupo = estud_grupo::uncampo('id', $pago[0]->idmatricula, 'idgrupo');
        $pago[0]->idprograma = grupos::uncampo('id', $pago[0]->idgrupo, 'idprograma');
        $pago[0]->nombreprograma = programas::uncampo('id', $pago[0]->idprograma, 'nombre');

        $router->render('dashboard/adminestudiantes/print', ['titulo'=>'Admin', 'pago'=>$pago, 'session'=>$_SESSION]);
    }

    public static function pdf(Router $router){
        session_start();
        isauth();
        $id = $_GET['id']; //id del pago
        if(!is_numeric($id))return;

        $pago = pagos::idregistros('id', $id); //idmatricula = id de estud_grupo
        $pago[0]->idestudiante = estud_grupo::uncampo('id', $pago[0]->idmatricula, 'idestudiante');
        $pago[0]->estudiante = estudiantes::idregistros('id', $pago[0]->idestudiante); //datos basicos de estudiante
        $pago[0]->idgrupo = estud_grupo::uncampo('id', $pago[0]->idmatricula, 'idgrupo');
        $pago[0]->idprograma = grupos::uncampo('id', $pago[0]->idgrupo, 'idprograma');
        $pago[0]->nombreprograma = programas::uncampo('id', $pago[0]->idprograma, 'nombre');
        
        //$idmatricula = pagos::uncampo('id', $id, 'idmatricula'); //revisar metodo cuando el id no esta en bd ya que muestr error
        ob_start(); 
        include_once __DIR__. "/../views/templates/plantillapdf.php";
        $htmlpdf = ob_get_clean();
        //echo $htmlpdf;

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled'=>true));
        $dompdf->setOptions($options);

        $dompdf->loadhtml($htmlpdf);
        $dompdf->setPaper('letter');
        //$dompdf->setPaper('A4', 'Landscape');
        $dompdf->render();
        $dompdf->stream('archivo.pdf', array('Attachment'=>false));
    }
}
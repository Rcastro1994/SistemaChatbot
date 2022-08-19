<?php

require_once 'models/testpsicologico.php';
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

class testController {

    public function gestion() {
        $test = new Testpsicologico();
        $tests = $test->getAll();
        require_once 'views/test/gestion.php';
    }

    public function registrarTest() {
        require_once 'views/test/registrar.php';
    }

    public function save() {

        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $pregunta1 = isset($_POST['pregunta1']) ? trim($_POST['pregunta1']) : false;
            $pregunta2 = isset($_POST['pregunta'][0]) ? trim($_POST['pregunta'][0]) : false;
            $pregunta3 = isset($_POST['pregunta'][1]) ? trim($_POST['pregunta'][1]) : false;
            $pregunta4 = isset($_POST['pregunta'][2]) ? trim($_POST['pregunta'][2]) : false;
            $pregunta5 = isset($_POST['pregunta'][3]) ? trim($_POST['pregunta'][3]) : false;
            $pregunta6 = isset($_POST['pregunta'][4]) ? trim($_POST['pregunta'][4]) : false;
            $pregunta7 = isset($_POST['pregunta'][5]) ? trim($_POST['pregunta'][5]) : false;
            $pregunta8 = isset($_POST['pregunta'][6]) ? trim($_POST['pregunta'][6]) : false;
            $pregunta9 = isset($_POST['pregunta'][7]) ? trim($_POST['pregunta'][7]) : false;
            $pregunta10 = isset($_POST['pregunta'][8]) ? trim($_POST['pregunta'][8]) : false;

            $validar = Utils::validateTest($nombre, $pregunta1, $pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10);
            if ($validar == false) {
                $test = new Testpsicologico();
                $test->setNombre($nombre);
                $test->setPregunta1($pregunta1);
                $test->setPregunta2($pregunta2);
                $test->setPregunta3($pregunta3);
                $test->setPregunta4($pregunta4);
                $test->setPregunta5($pregunta5);
                $test->setPregunta6($pregunta6);
                $test->setPregunta7($pregunta7);
                $test->setPregunta8($pregunta8);
                $test->setPregunta9($pregunta9);
                $test->setPregunta10($pregunta10);

                $save = $test->saveTest();

                if ($save) {
                    $_SESSION['register'] = "complete";
                }
            } else {
                $_SESSION['register'] = $validar;
            }

            header("Location:" . base_url . 'test/registrarTest');
        }
    }

    public function eliminarTest() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $test = new Testpsicologico();
            $test->setId($id);

            $t = $test->deleteTest();
        }
        header("Location:" . base_url . 'test/gestion');
    }

    public function editarTest() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $test = new Testpsicologico();
            $test->setId($id);
            $t = $test->getOne();
        }
        require_once 'views/test/editarTest.php';
    }

    public function update() {
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $pregunta1 = isset($_POST['pregunta1']) ? trim($_POST['pregunta1']) : false;
            $pregunta2 = isset($_POST['pregunta2']) ? trim($_POST['pregunta2']) : false;
            $pregunta3 = isset($_POST['pregunta3']) ? trim($_POST['pregunta3']) : false;
            $pregunta4 = isset($_POST['pregunta4']) ? trim($_POST['pregunta4']) : false;
            $pregunta5 = isset($_POST['pregunta5']) ? trim($_POST['pregunta5']) : false;
            $pregunta6 = isset($_POST['pregunta6']) ? trim($_POST['pregunta6']) : false;
            $pregunta7 = isset($_POST['pregunta7']) ? trim($_POST['pregunta7']) : false;
            $pregunta8 = isset($_POST['pregunta8']) ? trim($_POST['pregunta8']) : false;
            $pregunta9 = isset($_POST['pregunta9']) ? trim($_POST['pregunta9']) : false;
            $pregunta10 = isset($_POST['pregunta10']) ? trim($_POST['pregunta10']) : false;

            $validar = Utils::validateTest($nombre, $pregunta1, $pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10);
            if ($validar == false) {
                $test = new Testpsicologico();
                $test->setNombre($nombre);
                $test->setPregunta1($pregunta1);
                $test->setPregunta2($pregunta2);
                $test->setPregunta3($pregunta3);
                $test->setPregunta4($pregunta4);
                $test->setPregunta5($pregunta5);
                $test->setPregunta6($pregunta6);
                $test->setPregunta7($pregunta7);
                $test->setPregunta8($pregunta8);
                $test->setPregunta9($pregunta9);
                $test->setPregunta10($pregunta10);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $test->setId($id);
                    $save = $test->updateTest();
                }

                if ($save) {
                    $_SESSION['edited'] = "complete";
                }
            } else {
                $_SESSION['edited'] = $validar;
            }

            header("Location:" . base_url . 'test/gestion');
        }
    }

    public function imprimir() {
        $test = new Testpsicologico();
        $tests = $test->getAll();
        $html2pdf = new Html2Pdf('L','B4');
        ob_start();
        require_once 'views/test/imprimirTests.php';
        $html = ob_get_clean();
        ob_end_clean();
        $html2pdf->writeHTML($html);
        $html2pdf->output();
    }

}

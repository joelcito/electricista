<?php

namespace App\Utils;

// use Illuminate\Contracts\Support\Arrayable;

class Util
{

    public function getMesLiteral($fecha){
        return $this->MesLiteral(explode("-", $fecha)[1]);
    }

    public function getAnio($fecha){
        return explode("-", $fecha)[0];
    }

    public function MesLiteral($mes){

        $mesLiteral =  '';
        switch ($mes) {
            case '01':
                $mesLiteral= 'ENERO';
                break;
            case '02':
                $mesLiteral= 'FEBRERO';
                break;
            case '03':
                $mesLiteral= 'MARZO';
                break;
            case '04':
                $mesLiteral= 'ABRIL';
                break;
            case '05':
                $mesLiteral= 'MAYO';
                break;
            case '06':
                $mesLiteral= 'JUNIO';
                break;
            case '07':
                $mesLiteral= 'JULIO';
                break;
            case '08':
                $mesLiteral= 'AGOSTO';
                break;
            case '09':
                $mesLiteral= 'SEPTIEMBRE';
                break;
            case '10':
                $mesLiteral= 'OCTUBRE';
                break;
            case '11':
                $mesLiteral= 'NOVIEMBRE';
                break;
            case '12':
                $mesLiteral= 'DICIEMBRE';
                break;
            default:
                # code...
                break;
        }

        return $mesLiteral;

    }

}

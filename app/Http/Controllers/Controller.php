<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // FUNÇÃO PARA FORMATAR URL PARA URL AMIGÁVEL
    public static function cleanUrl($string)
    {
        $table = array(

            '/' => '', '(' => '', ')' => '',

        );

        $string = strtr($string, $table);

        $string = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);

        $string = preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));

        $string = strtolower($string);

        $string = str_replace("ç", "c", $string);

        $string = str_replace("?", " ", $string);

        $string = str_replace(" ", "-", $string);

        $string = str_replace("---", "-", $string);

        return $string;
    }
}

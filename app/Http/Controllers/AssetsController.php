<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class AssetsController extends Controller
{
    public function apply()
    {
        $original = Input::get('string');

        $assetLeft = '{{ asset(\'';
        $assetRight = '\') }}';
        $href = 'href="';
        $src = 'src="';
        $css = '.css';
        $js = '.js';
        $final = [];
        foreach (preg_split('/([^>?]+[>?]+)/', $original, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY) as $line) {
            $hrefPos = strpos($line, $href);
            $srcPos = strpos($line, $src);
            $protocol = strpos($line, 'http') ? strpos($line, 'http') : strpos($line, 'https');
            if ($protocol || strpos($line, $assetLeft) || strpos($line, $assetRight))
                array_push($final, $line);
            else if ($hrefPos) {
                $left = substr_replace($line, $assetLeft, $hrefPos + strlen($href), 0);
                if ($extensionPos = strpos($left, $css))
                    array_push($final, substr_replace($left, $assetRight, $extensionPos + strlen($css), 0));
            } else if ($srcPos) {
                $left = substr_replace($line, $assetLeft, $srcPos + strlen($src), 0);
                if ($extensionPos = strpos($left, $js))
                    array_push($final, substr_replace($left, $assetRight, $extensionPos + strlen($js), 0));
            } else {
                if (preg_match('/<\/script>/', $line))
                    $final[sizeof($final) - 1] = last($final) . $line;//return view('app.apply')->withErrors('No href or src attribute found');
                else array_push($final, $line);
            }
        }


        return $final;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function apply(Request $request)
    {
        $original = $request->string;
        $assetLeft = $request->secure ? '{{ secure_asset(\'' : '{{ asset(\'';
        $assetRight = '\') }}';
        $href = 'href="';
        $src = 'src="';
        $final = [];
        $lines = preg_split('/([^>]+[>]+)/', $original, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        foreach ($lines as $line) {
            $line = trim($line);
            $extension = self::getExtension($line);
            $hrefPos = strpos($line, $href);
            $srcPos = strpos($line, $src);
            $protocol = strpos($line, 'http') ? strpos($line, 'http') : strpos($line, 'https');
            if ($protocol || strpos($line, $assetLeft) || strpos($line, $assetRight) || strpos($line, '{}') || strpos($line, '\//'))
                array_push($final, $line);
            else if ($hrefPos) {
                $left = substr_replace($line, $assetLeft, $hrefPos + strlen($href), 0);
                if ($extensionPos = strpos($left, $extension))
                    array_push($final, substr_replace($left, $assetRight, $extensionPos + strlen($extension), 0));
            } else if ($srcPos) {
                $left = substr_replace($line, $assetLeft, $srcPos + strlen($src), 0);
                if ($extensionPos = strpos($left, $extension))
                    array_push($final, substr_replace($left, $assetRight, $extensionPos + strlen($extension), 0));
            } else {
                if (preg_match('/<\/script>/', $line)) {
                    $final[sizeof($final) - 1] = last($final) . $line;//return view('app.apply')->withErrors('No href or src attribute found');
                } else
                    array_push($final, $line);
            }
        }

        return json_encode($final);
    }

    private function getExtension($string)
    {
        $extensions = ['.js', '.css', '.jpeg', '.png', '.xml'];
        foreach ($extensions as $extension) {
            if (strpos($string, $extension))
                return $extension;
        }
    }
}

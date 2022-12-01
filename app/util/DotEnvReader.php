<?php

namespace app\util;

use app\util\model\DotenvModel;

abstract class DotEnvReader extends DotenvModel
{

    /**
     * @param $path
     * @param $file
     * @return array
     */
    public static function loadDotEnv($path, $file) : array
    {
        if(file_exists($file)){

        }

        return [];
    }

    /**
     * Returns true if the file is a
     * @param $file
     * @return bool
     */
    private function isEnvExtension($file) : bool
    {
        if(pathinfo($file, PATHINFO_EXTENSION) == 'env')
        {
            return true;
        }
        return false;
    }
}
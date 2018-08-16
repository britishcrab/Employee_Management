<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * @param $datas
     * 配列のkeyとvalueを
     * sessionのkeyとvalueにセットする
     */
    public static function setSession($datas)
    {
        foreach ($datas as $key => $data)
        {
            session([$key => $data]);
        }
        return;
    }

    /**
     * @param $datas
     * @return mixed
     * ほしい配列のkey名を配列として渡すと
     * sessionからそのkey名の配列を返す
     */
    public static function setArray($keys)
    {
        foreach ($keys as $data)
        {
            $array[$data] = session($data);
        }
        return $array;
    }
}

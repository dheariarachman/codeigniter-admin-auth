<?php

use Carbon\Carbon;

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 
 * @method _load_menu
 * @param string segment,
 * @param string module,
 * @param array class,
 * @param string url,
 * @param string title
 * @return string menu
 */
if (!function_exists('_load_menu')) {
    function _load_menu($segment = null, $module = null, $class = array(), $url = null, $title = null)
    {
        echo '<li class="'.(($segment == $module) ? 'active' : '').'"><a class="'.$class[0].'" href="'.$url.'">'.(!empty($class[1]) ? '<i class="'.$class[1].'"></i>' : '').'<span>'.$title.'</span></a></li>';
    }
}

/**
 * Last Login
 * 
 * Membuat Fungsi atau tampilan yang memperlihatkan kapan terakhir user Login
 * @method _last_login
 * @param int last_login
 * @return string
 */
if (!function_exists('_last_login')) {
    function _last_login($last_login = null)
    {
        $last       = date('d-M-Y H:i:s', $last_login);
        $convert    = Carbon::parse($last);
        return $convert->diffForHumans();
    }
}
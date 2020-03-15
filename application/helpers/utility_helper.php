<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

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
        echo '<li class="' . (($segment == $module) ? 'active' : '') . '"><a class="' . $class[0] . '" href="' . $url . '">' . (!empty($class[1]) ? '<i class="' . $class[1] . '"></i>' : '') . '<span>' . $title . '</span></a></li>';
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
        $last = date('d-M-Y H:i:s', $last_login);
        $convert = Carbon::parse($last);
        return $convert->diffForHumans();
    }
}

/**
 * Options Helper
 * @method options_array
 * @param array data
 * @param string id
 * @param string column
 * @return array
 */
if (!function_exists('options_array')) {
    function options_array(array $data = array(), string $id = null, string $column = null): array
    {
        // $arrayReturn    = array();
        $arrayReturn[0] = '-- Pilih ' .ucfirst($column). ' --';
        foreach ($data as $key => $value) {
            $arrayReturn[$value->$id] = $value->$column;
        }
        return $arrayReturn;
    }
}

/**
 * Create Currency Format
 * @method number_to_currency
 * @param int number
 * @return int
 */
if (!function_exists('number_to_currency')) {
    function number_to_currency(int $number = 0)
    {
        $fmt = numfmt_create('id_ID', NumberFormatter::CURRENCY);
        return numfmt_format_currency($fmt, $number, "IDR");
    }
}
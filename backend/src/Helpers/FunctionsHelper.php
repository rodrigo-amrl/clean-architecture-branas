<?php

if (!function_exists('format_date')) {
    function format_date($data, $br = null, $hour = null)
    {
        if (empty($data)) return null;

        if ($data == '0000-00-00 00:00:00' || $data == '0000-00-00') return null;

        $datetime = null;

        if ($hour == 'last')
            $hour = ' 23:59:59';
        else if ($hour == 'first')
            $hour = ' 00:00:00';
        else if ($hour) {
            $hour = null;
            $datetime = ' H:i';
        }

        if ($br == "BR") return  date('d/m/Y' . $datetime, strtotime($data));

        return  date('Y-m-d' . $datetime, strtotime(str_replace('/', '-', $data))) . $hour;
    }
}

<?php

use App\Config\App;

function asset_url($file)
{
    return App::BASE_URL . '/' . $file;
}
function route($route, $id = null)
{
    $transform_url = str_replace('.', '/', $route);
    $url = App::BASE_URL . '/' . $transform_url;

    if ($id) $url .= '/' . $id;

    return $url;
}
function vite_url($file)
{
    return App::VITE_URL . '/' . $file;
}
if (!function_exists('arrayToObject')) {
    function arrayToObject($array)
    {
        if (empty($array)) return null;
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value))
                $object->$key = arrayToObject($value);
            else
                $object->$key = $value;
        }
        return $object;
    }
}
/**
 * Renderiza a pagina, já com a estrutura do layout
 *
 * @param String $file
 * @param array $data
 * @param string $layout
 */
function view($file, $data = [], $layout = 'layout', $path = "site/pages/")
{
    //pagina atual
    $page = BASE_VIEW . $path . $file . '.php';

    //transforma os dados do array em variáveis
    extract($data);

    //layout selecionado
    $layout = BASE_VIEW . 'site/layout/' . $layout . '.php';

    return file_exists($layout) ? require($layout) : '';
}

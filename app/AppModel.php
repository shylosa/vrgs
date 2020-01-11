<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AppModel extends Model
{
    public const FIRST_PAGE = 1;
    /**
     * Return current page number
     *
     * @param Request $request
     * @return |null
     */
    public static function getPageNumber(Request $request)
    {
        $param = $request['page'];

        return (isset($param) && filter_var($param, FILTER_VALIDATE_INT)) ?
            ($param - 1) * Controller::ON_PAGE :
            null;
    }
}

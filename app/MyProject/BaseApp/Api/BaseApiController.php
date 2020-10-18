<?php
namespace App\MyProject\BaseApp\Api;

use App\Http\Controllers\Controller;
use App\MyProject\BaseApp\Api\Traits\ApiResponser;

class BaseApiController extends Controller
{
    use ApiResponser;
}

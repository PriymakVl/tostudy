<?php

namespace app\controllers;

use app\models\Alias;

/**

create alias for exist item table
*/

class AliasController extends \app\controllers\BaseController
{
    public function actionAdd()
    {
    	Alias::add();
        debug('end');
    }


}

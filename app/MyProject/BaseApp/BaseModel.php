<?php

namespace App\MyProject\BaseApp;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    public function getData() {
        return $this;
    }

}

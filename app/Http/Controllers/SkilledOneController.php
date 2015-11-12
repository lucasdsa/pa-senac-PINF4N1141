<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\SkilledOne;

class SkilledOneController extends Controller {

    public function index() {

        return SkilledOne::all();
    }
}

?>
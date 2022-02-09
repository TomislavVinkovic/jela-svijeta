<?php

namespace App\Models\ViewModels;

class JeloVM {


    public function __construct($t, $d, $c, $u){
        $this->titles = $t;
        $this->descriptions = $d;
        $this->created_at = $c;
        $this->updated_at = $u;
    }

    public $titles;
    public $descriptions;
    public $created_at;
    public $updated_at;

}
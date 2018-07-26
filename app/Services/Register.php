<?php
    namespace App\Services;
    use App\Models\Hoge;
    class HogeService{
        public function getHoge(){
            return Hoge::all();
        }
    }
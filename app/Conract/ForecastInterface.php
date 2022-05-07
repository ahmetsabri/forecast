<?php
namespace App\Conract;

interface ForecastInterface {
    public function pull();
    public function isCallable();
    public function update(array $data);
}

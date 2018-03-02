<?php

namespace Blog\Controller;

interface IController {
    public function run();
    public function hasErrors();
    public function getErrors();
    
}
<?php

namespace AtToRouter;

 class Router {
  private $routes = [];

  public function map($method, $route, $target) {
   $this->routes[] = [
          "method" => $method,
          "route" => $route,
          "target" => $target
    ];
  }
  public function examine() {
   $uri = $_SERVER["REQUEST_URI"];
   $method = $_SERVER["REQUEST_METHOD"];
    foreach($this->routes as $route) {
     if($route["method"] === $method && $route["route"] === $uri) {
      call_user_func($route['target']);
      return;
     }
    }
      http_response_code(404); 
      echo "404 not found";
      return null;
  }
 }

?>
<?php

class Router {
    private $routes = [];

    public function specify($method, $route, $event) {
        $this->routes[] = [
            "method" => $method,
            "route" => $route,
            "event" => $event
        ];
    }

    public function examine() {
        $method = "GET";
        $page = null;

        if (isset($_GET["route"])) {
            $page = $_GET["route"];

            foreach ($this->routes as $route) {
                if ($route["method"] === $method) { 
                    if ($route["route"] === $page) {  //route ที่กำหนดตรงกับที่มา
                        call_user_func($route["event"]);
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo "404 not found";
    }
}

?>
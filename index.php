<?php 

$routes = [];




function route(string $path, callbale $callback){
    global $routes;
    //$routes[$path]= $callback;
}
function run(){
    global $routes;
    $uri = $_SERVER["REQUEST_URI"];
    foreach ($routes as $path => $callback) {
        echo "path";
        if($path !== $uri)continue;
       // $routes[$path] = $callback();
    }
};
route("/login",function(){
    echo "HOme Page";
});
//run();
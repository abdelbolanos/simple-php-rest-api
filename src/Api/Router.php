<?php
namespace Api;

use \Api\Response as Response;

class Router
{
    private $route;
    private $stringRoute;
    private $request;

    private function __construct()
    {
        $this->stringRoute = (isset($_GET[ROUTE_PARAM])) ? $_GET[ROUTE_PARAM] : false;
        $this->request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD']);
        $this->route = $this->findRoute();
    }

    private function getAllRoutes()
    {
        $routes = array(); 

        $cdir = scandir(MODULES_PATH);

        foreach ($cdir as $key => $moduleName) {
            if (!in_array($moduleName, array(".",".."))) {
                if (is_dir(MODULES_PATH . DIRECTORY_SEPARATOR . $moduleName)) {
                    $class = $moduleName . '\Routes';
                    $moduleRoutes = $class::getRoutes();
                    $routes = array_merge($routes, $moduleRoutes);
                }
            }
        }

        return $routes;
    }

    private function findRoute()
    {
        $routes = $this->getAllRoutes();

        foreach ($routes as $routeConfig) {
            $routeMatch = $routeConfig['route'];
            $search = ["/"];
            $replace = ["\/"];
            $routeMatch = '/' . str_replace($search, $replace, $routeMatch) . '/';
            $match = preg_match($routeMatch, $this->stringRoute, $matches);
            $method = (array_key_exists('method', $routeConfig)) ? $routeConfig['method'] : 'GET';
            if ($match === 1 && $this->request->method == $method) {
                $this->request->setGroupParams($matches);
                return $routeConfig;
                break;
            }
        }

        return false;
    }

    public static function create()
    {   
        return new Router();
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function processRoute($output=true)
    {
        if ($this->route) {
            $controller = $this->route['controller'];
            $action = $this->route['action'];
            try {
                $instance = new $controller();
                $responseData = $instance->$action($this->request);
            } catch (\Exception $e) {
                $responseData = Response::responseError(
                    [
                        'Controller' => $controller,
                        'Action' => $action,
                        'ErrorCode' => $e->getCode(),
                        'ErrorMessage' => $e->getMessage(),
                        'ErrorTrace' => $e->getTraceAsString(),
                    ]
                );
            }
        } else if ($this->stringRoute === false) {
            $responseData = Response::responseError(sprintf("Route Param '%s' not required in index.php: ", ROUTE_PARAM));
        } else {
            $responseData = Response::responseNotFound('Route not Found: ' . $this->stringRoute);
        }
        
        //Response
        $response = new Response($this->route);
        if ($output) {
            $response->outputResponse($responseData);
        } else {
            return $response;
        }
    }

}
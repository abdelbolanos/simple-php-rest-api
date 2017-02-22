# simple-php-rest-api
A very simple REST API in PHP

## Introduction
This REST API is a very simple one but powerful. It is divided in two folders *public* and *src*. The *public* folder is going to be exposed by the web server and *src* will contain our code protected from external access.

## The SRC autopsy

### init.php
This file gets included from *public/index.php* and starts the API.

### constants.php
All the constants available. Create your own here.

### autoload.php
Autoload php classes declared in the folders *api*, *utils* and *modules* only if the classes has the same name as the php file (Example: if we call  `new \Foo\MyModel` it will try to load it from *Foo* folder as *MyModel.php*).

Load from others folders can be added in the constant *AUTOLOAD_PATHS* in *constants.php*

### api folder
Contains the bases classes of the API and the classes that any module should extend.

### utils folder
Set of classes for multi purpose. Like Http requests.

### module folder
This folder we can create endelss folders that will consider as *modules*.

Is required that each module contains a *Routes.php* file and a *Controller.php* file.

#### Module -> Routes.php
This file contains the available endpoints that points to functions in the *Controller.php* file. The *route* key in the *routes* array will match by regex with the param constant *ROUTE_PARAM* passed by GET to *public/index.php*

Also the key *method* forces to accept the request if matches the request method (POST, GET, etc).

The key *responseType* forces the api to output the result as JSON or HTML. (This can be extended to output other things like images).

Example:
```
'route' => '^/foo/(?P<name>[A-Za-z]+)$'

will match api url  index.php?_route_=/foo/pelican

and from the Controller class `pelican` will be captured as a 
group param `name`, $request->groupParams['name']
```
#### Module -> Controller.php
Contains all the business logic for a matched route. Route.php will call the controller from the key *controller* and the method from *action*.

Example:
```
'controller' => FooController::class,
'action' => 'getFoo',

From controller FooController call the method getFoo.
```

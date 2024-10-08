<?php

use ishop\Router;

//specific routes




//default routes
Router::add('^admin$', ['controller'=>'Main','action'=>'Index','prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',['prefix'=>'admin']);

Router::add('^$', ['controller'=>'Main','action'=>'Index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Codegenerator\Controller\Codegenerator' => 'Codegenerator\Controller\CodegeneratorController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'codegenerator' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/codegenerator[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Codegenerator\Controller\Codegenerator',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'codegenerator' => __DIR__ . '/../view',
        ),
    ),
);

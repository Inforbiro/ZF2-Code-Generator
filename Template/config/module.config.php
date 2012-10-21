<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'{$module}\Controller\{$module}' => '{$module}\Controller\{$module}Controller'
		)
	),
	'router' => array(
		'routes' => array(
			'{$moduleLower}' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/{$moduleLower}[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+'
					),
					'defaults' => array(
						'controller' => '{$module}\Controller\{$module}',
						'action' => 'index'
					)
				)
			)
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'{$moduleLower}' => __DIR__ . '/../view'
		),
	)
);
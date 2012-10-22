ABOUT ZF CODE GENERATOR
===================

The ZF Code Generator is a web interface for automatic code creation.

Currently, it is suported only module code generator and new features will be implemented in the future (models, forms, controllers...).

REQUIREMENTS AND NOTES
===================

- The ZF Code Generator is created for Zend Framework 2 and can't be used with the previous ZF version.

- Up and running ZF2 application (e.g. Skeleton Application). Because ZF Code Generator is a module itself it requires working application, i.e. the module doesn't create an application but modules only

- The ZF Code Generator is not a part of the ZF Tool nor can be run using command line (maybe in the future).

- The module has it's own layout and assets

- Created view file will be empty, it's up to you to modify it

- It is strongly recommended to use the module on a development environment only!

INSTALLATION
===================

- Extract the folder's content into module/Codegenerator folder

- Copy content of the module's public folder into application public folder

- Add valid permissions to the module's folder, if necessary

- Add the module name in the application config file (config/application.config.php), in order to "activate" the module, e.g.:

...
'modules' => array(
	'Application',
	...,
	'Codegenerator', <-- Add this line
    ),
...

- That's it! You are now ready to create new modules auto-magically.

USAGE
===================

- Visit http://%yoursite%/codegenerator (or http://%yoursite%/public/codegenerator if you didn't setup virtual host)

- The welcome page will be displayed

- Select Module Generator

- Enter your module's name and click the Create button

- New module will be created and ready for use

- Add new module's name in the application config file (config/application.config.php), in order to "activate" new module, e.g.:

...
'modules' => array(
        'Application',
		'Codegenerator',
		'Newmodule', <-- Add here your module name
    ),
...

TODO
===================

- Add support for syntax ModuleName

- Add support for choosing module folder

- Display sidebar menu as separated view

- Develop other features (

FURTHER READING
===================

Detail usage and instructions on: http://www.inforbiro.com/blog-eng/zend-framework-2-code-generator-tool/

ABOUT THE AUTHOR
===================

Nenad Mitrovic - MitraX is an information technology engineer with more than 10 years of experience in software industry.
He is also creator of the first Serbian live CD GNU/Linux distribution named MitraX (hence comes his nickname).

HOW TO CONTRIBUTE
===================

- test the module and create issues on the project's page on GitHub

- spread the word

- write extensions (e.g. Controller Generator...)


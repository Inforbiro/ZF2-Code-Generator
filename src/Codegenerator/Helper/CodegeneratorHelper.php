<?php

namespace Codegenerator\Helper;

class CodegeneratorHelper
{
	/**
	* Create a module
	* @param $moduleName - string - Name of new module
	*/
	public function createModule($moduleName)
	{
		$this->copyTemplate(__DIR__ . '/../../../Template', 'module/'.$moduleName, $moduleName);
	}
	
	/**
	* Method copies Template folder's structure to new module with replaced variable holders
	*
	* @param $sourceFolder - string - Template folder's path
	* @param $destinationFolder - string - Destination folder's path
	* @param $module - string - Name of new module
	*/
	private function copyTemplate($sourceFolder, $destinationFolder, $moduleName)
	{
		/*echo "<hr/>";
		echo "<br/>SOURCE: ".$sourceFolder."<br/>";
		echo "<br/>DESTINATION: ".$destinationFolder."<br/>";*/
		
		$moduleNameLower = strtolower($moduleName);
		$currentTemplateDirectory = dir($sourceFolder);
		
		// If destination folder doesn't exist, create it (umask is used for setting permissions)
		if(!is_dir($destinationFolder)) {
			$umaskOrg = umask(0);
			//mkdir($destinationFolder, 0, true); // TODO Maybe to set permission
			mkdir($destinationFolder, 0777); //Set permissions
			umask($umaskOrg);
		}
		
		// Pass through folder's content and copy it to new module
		while ($iNodeSource = $currentTemplateDirectory->read()) {
			if ($iNodeSource != "." && $iNodeSource != "..") {
				$iNodeDestination = str_replace("template", $moduleNameLower, $iNodeSource);
				$iNodeDestination = str_replace("Template", $moduleName, $iNodeDestination);
				
				if (is_dir($sourceFolder."/".$iNodeSource)) {
					// Copy current folder's structure
					$this->copyTemplate($sourceFolder."/".$iNodeSource, 
										$destinationFolder.'/'.$iNodeDestination, 
										$moduleName);
				} else {
					$template = file_get_contents($sourceFolder . "/" . $iNodeSource);
					$template = str_replace('{$module}', $moduleName, $template);
					$template = str_replace('{$moduleLower}', $moduleNameLower, $template);
					file_put_contents($destinationFolder.'/'.$iNodeDestination, $template);
				}
			}
		}
		
		$currentTemplateDirectory->close();
		
	}
}

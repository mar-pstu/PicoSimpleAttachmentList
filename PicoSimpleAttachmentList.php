<?php

/**
* Строит списки файлов
*
* @author chomovva
* @license http://opensource.org/licenses/MIT
*/
class PicoSimpleAttachmentList extends AbstractPicoPlugin {


	const API_VERSION = 3;

    
    protected $enabled = true;


	public function onSinglePageLoaded(array &$pageData ) {
		$pageData[ 'files' ] = [];
	}

	
	public function onPageRendering( string &$templateName, array &$twigVariables ) {
		if ( isset( $twigVariables[ 'current_page' ][ 'meta' ][ 'files_dir' ] ) ) {
			$assets_path = str_replace( [ '/', '\\' ], DIRECTORY_SEPARATOR, trim( $twigVariables[ 'current_page' ][ 'meta' ][ 'files_dir' ], "\n\r\t\v\0" ) );
			if ( $assets_path ) {
				$files = array_map( function ( $file ) use ( $twigVariables ) {
					return [
						'name'      => pathinfo( $file, PATHINFO_FILENAME ),
						'extension' => pathinfo( $file,  PATHINFO_EXTENSION ),
						'url'       => $twigVariables[ 'config' ][ 'assets_url' ] . str_replace( $twigVariables[ 'config' ][ 'assets_dir' ], '', $file ),
					];
				}, glob( $twigVariables[ 'config' ][ 'assets_dir' ] . $assets_path . '/*.{doc,docx,odt,rtf,ppt,pptx,pdf,xlsx,xls,rar,zip,7z}', GLOB_BRACE ) );
				$twigVariables[ 'files' ] = $files;
			}
		}
	}

}
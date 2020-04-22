/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.uiColor = '#F7EDEB';
	config.filebrowserBrowseUrl = _base_url+ 'assets/vendors/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = _base_url+ 'assets/vendors/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = _base_url+ 'assets/vendors/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = _base_url+ 'assets/vendors/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = _base_url+ 'assets/vendors/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = _base_url+ 'assets/vendors/kcfinder/upload.php?opener=ckeditor&type=flash';
	
	config.contentsCss = 'contents.css';
	config.font_names = 'Rupee_foradianregular/rupee_foradianregular;' + config.font_names;	

	

};





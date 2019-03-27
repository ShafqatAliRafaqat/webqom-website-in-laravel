/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

	config.extraAllowedContent= 'span(*)',

	//config.protectedSource.push(/<i[^>]*><\/i>/g);
	//CKEDITOR.dtd.$removeEmpty['i(*)'] = false;

	config.allowedContent = true,
   
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.allowedContent = true;
	//config.allowedContent: true,
	//CKEDITOR.dtd.$removeEmpty['i'] = false
	//config.extraAllowedContent = 'span(*)';//allowing span tag
	//config.extraAllowedContent = 'i(*)';//allowing span tag
	//config.extraAllowedContent = 'i(*)';
	
        //CKEDITOR.dtd.$removeEmpty.['i'] = false;
    

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	//config.extraPlugins = 'imageuploader';

   config.filebrowserBrowseUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'http://192.185.100.172/~smarttel/assets/vendors/kcfinder/upload.php?opener=ckeditor&type=flash';

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

 //CKEDITOR.dtd.$removeEmpty.span = false;
	// allow i tags to be empty (for font awesome)
	//CKEDITOR.dtd.$removeEmpty['i'] = false;

	//config.protectedSource.push(/<i[^>]*><\/i>/g);

	//config.allowedContent = true;
    //config.extraAllowedContent = 'p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*}';
    //CKEDITOR.dtd.$removeEmpty.i = 0;

  //CKEDITOR.dtd.$removeEmpty['i'] = false

  // ALLOW <i></i>
  //config.protectedSource.push( /<i[\s\S]*?\>/g ); //allows beginning <i> tag
  //config.protectedSource.push( /<\/i[\s\S]*?\>/g ); //allows ending </i> tag

  CKEDITOR.dtd.$removeEmpty['i'] = false;
};
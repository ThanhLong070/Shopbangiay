function ckeditor(name) {
	var editor = CKEDITOR.replace(name,{
		uiColor: '#9AB8F3',
		language:'vi',
		filebrowserBrowseUrl : baseUrl+"{{asset('backend')}}/dist/js/ckediter/ckediter.js",
		filebrowserImageBrowseUrl : baseUrl+"{{asset('backend')}}/dist/js/ckfinder/ckfinder.html?type=Images",
		filebrowserFlashBrowseUrl : baseUrl+"{{asset('backend')}}/dist/js/ckfinder/ckfinder.html?type=Flash",
		filebrowserUploadUrl : baseUrl+"{{asset('backend')}}/dist/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
		filebrowserImageUploadUrl : baseUrl+"{{asset('backend')}}/dist/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
		filebrowserFlashUploadUrl : baseUrl+"{{asset('backend')}}/dist/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
		toolbar:[
			['Source', 'Preview', 'Templates'],
			['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'],
			['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
			'/',
			['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
			['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
			['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
			['BidiLtr', 'BidiRtl'],
			['Link', 'Unlink', 'Anchor'],
			['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'],
			'/',
			['Styles', 'Format', 'Font', 'FontSize'],
			['TextColor', 'BGColor'],
			['Maximize', 'ShowBlocks', 'Syntaxhighlight']
		]
	})
}
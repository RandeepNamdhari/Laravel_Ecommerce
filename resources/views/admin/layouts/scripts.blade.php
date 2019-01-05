<script type="text/javascript">
	var $BASE__URL="{{URL::to('/admin')}}";
</script>
<script src="{{asset('public/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/base/treeview.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/forms/widgets/summernote.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/forms/widgets/bootstrap-switch.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/forms/widgets/dropzone.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/assets/demo/default/custom/components/forms/widgets/select2.js')}}" type="text/javascript"></script>
		<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>

		<script>
			var textarea = document.getElementById('ckeditor1');
//CKEditor.replace(textarea);
			CKEDITOR.replace( textarea );

			function saveByAjax(formid)
	{
		var dataString = new FormData($("#" + formid)[0]);
		var url=$('#'+formid).attr('action');
		$('.text-danger').remove();

	  
	  $.ajax(
	{
		type: "POST",
		url:url,
		data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false, // The content type used when sending data to the server.
		cache: false, // To unable request pages to be cached
		processData: false,
		enctype: 'multipart/form-data',
		success: function(data)
		{
		  
		  if(data.status=='success')
			location.reload();
		},
		  error: function (data) {
		var errors = $.parseJSON(data.responseText);

				$.each(errors.errors, function (key, value) {
        //console.log()
		  $('#'+formid).find('[name="'+key+'"]').parent('div').after('<span class="text-danger">'+value[0]+'</span>');
			// $('#' + key).parent().addClass('error');
		});
	}
	  });
	}
		</script>

		


		
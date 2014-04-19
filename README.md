#Introduce

A Yii widget with [uploadify](http://www.uploadify.com).

#Usage

Copy uploadify.php and views folder to components.

Import uploadify.js and uploadify.css in your views:

`
<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css" />
`

`
<script type="text/javascript" src="/uploadify/jquery.uploadify.min.js"></script>
`

Then put the widget where you want:

```php
/*
	'attr' is column
*/
<?php $this->widget('uploadify', array('model'=>$model,'attr'=>'license',));?>
```

This will print html code on the page:
`
<input id="Customer_license" type="hidden" value="" name="Customer[license]">
<input type="file" name="yii_uploadify_Customer_license" id="yii_uploadify_Customer_license" />
`

Afer that,write js to active it:

```js
$(document).ready(function(){
	$('#yii_uploadify_Customer_license').uploadify({
		'swf': '<?php echo Yii::app()->baseUrl;?>/uploadify/uploadify.swf',
		'uploader': '<?php echo Yii::app()->baseUrl;?>/uploadify/php/customer.php',
		'buttonText':'Upload',
		'fileTypeExts':'*.jpg;*.jpeg;*.gif;*.png',
		'removeCompleted':'true',
		'fileSizeLimit':'10MB',
		'onUploadSuccess':function(file,data,response){
			$("#Customer_license").val(data);
		}
});
```

#Sample

`
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css" />
</head>
<body>
	<?php $this->widget('uploadify', array('model'=>$model,'attr'=>'license',));?>

	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/uploadify/jquery.uploadify.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#yii_uploadify_Customer_license').uploadify({
					'swf'      : '<?php echo Yii::app()->baseUrl;?>/uploadify/uploadify.swf',
					'uploader' : '<?php echo Yii::app()->baseUrl;?>/uploadify/php/customer.php',
				'buttonText':'上传',
				'fileTypeExts':'*.jpg;*.jpeg;*.gif;*.png',
				'removeCompleted':'true',
				'fileSizeLimit':'10MB',
				'onUploadSuccess':function(file,data,response){
					$("#Customer_license").val(data);
				}
			}); 
		});
	</script>
</body>
</html>
`

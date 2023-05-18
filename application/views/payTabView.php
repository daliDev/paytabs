<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>select Cathegorie</h1>

	<div id="body">

		<div class='row'>
			<div class='col-lg-2'>
				<label>Cathegories :<label>
			</div>
			<div class='col-lg-2'>
				<select class="form-control catheg" id = "catheg_0">
				<option value=""></option>
					<?php foreach($arr_catheg as $row_catheg){?>
						<option value="<?php echo $row_catheg["id"]?>"><?php echo $row_catheg["catheg_name"]?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
	</div>

	
</div>

</body>
<script  src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script type="text/javascript">
$(function(){
//alert('test');
	$(document).on('change',".catheg",function(){
		var p_id = $(this).val();
		var arr_id = $(this).attr('id').split('_');
		var level = parseInt(arr_id[1])+1;
		$.ajax({
			url:"<?php echo base_url() ?>PayTabController/getCathegByParent",
			data:{parent_id:p_id},
			method : "POST",
			success:function(res){
				var src = $.parseJSON(res);
				var level2 = parseInt(level)+1;
				var level3 = parseInt(level2)+1;
				$("#catheg_"+level).parent().parent().remove();
				$("#catheg_"+level2).parent().parent().remove();
				$("#catheg_"+level3).parent().parent().remove();
				var sel = '<select class="form-control catheg" id="catheg_'+level+'">';
				sel += "<option value=''></option>";
				$.each(src,function(index,row){
					sel += "<option value='"+row.id+"'>"+row.catheg_name+"</option>";
				});
				$("#body").append("<div class='row'><div class='col-lg-2'></div><div class='col-lg-2'>"+sel+"</div></div>");
				//alert(sel);
			}
		});
	});
	});
</script>

</html>

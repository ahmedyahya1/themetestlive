// JavaScript Document
$jvh = jQuery.noConflict();
$jvh('.zolo-margin-inputs').on('change', function(e){
	$umargin = $jvh(this).parent().parent().parent();	
	var temp = '';
	$umargin.find('.zolo-margin-inputs').each(function(input_index, input){
		var margin_parameter = $jvh(input).attr('data-hmargin');
		var input_value = $jvh(input).val();
		if(input_value != '')
		{
			if(input_value.match(/^[0-9]+$/))
				input_value += 'px';
			temp += 'margin-'+margin_parameter+':'+input_value+';';
		}
	});
	$umargin.find('.zolo-margin-value').val(temp);
});
$jvh('.zolo-margins').each(function(index, element){
	$umargin = $jvh(this);
	var zolo_margin_value = $umargin.find('.zolo-margin-value').val();
	if(zolo_margin_value != '')
	{
		var vals = zolo_margin_value.split(';');
		$jvh.each(vals, function(i,vl){
			if(vl != '')
			{
				var splitval = vl.split(':');
				var margin_value = splitval[1];
				var param = splitval[0].split('-');
				var margin_parameter = param[1];
				$umargin.find('.zolo-margin-inputs').each(function(input_index, input){
					var input_margin_parameter = $jvh(input).attr('data-hmargin');
					if(margin_parameter == input_margin_parameter)
						$jvh(input).val(margin_value);
				});
			}
		})
	}
});
$('a#tank-submit').on('click', function() {
	var tank = $('input#tank').val();
	if ($.trim(tank) != '') {
		$.post('_pages/_ajax_st.php', {tank: tank}, function(data) {
			$('section#tankbox').text(data);
		});
	}
	if ($.trim(tank) != '') {
		$.post('_pages/schedule_tool.php', {tank: tank}, function(data) {
			$('input#tankid').text(data);
		});
	}
});
$('a#healer-submit').on('click', function() {
	var healer = $('input#healer').val();
	if ($.trim(healer) != '') {
		$.post('_pages/_ajax_st.php', {healer: healer}, function(data) {
			$('section#healerbox').text(data);
		});
	}
});
$('a#dps1-submit').on('click', function() {
	var dps1 = $('input#dps1').val();
	if ($.trim(dps1) != '') {
		$.post('_pages/_ajax_st.php', {dps1: dps1}, function(data) {
			$('section#dps1box').text(data);
		});
	}
});
$('a#dps2-submit').on('click', function() {
	var dps2 = $('input#dps2').val();
	if ($.trim(dps2) != '') {
		$.post('_pages/_ajax_st.php', {dps2: dps2}, function(data) {
			$('section#dps2box').text(data);
		});
	}
});
$('a#dps3-submit').on('click', function() {
	var dps3 = $('input#dps3').val();
	if ($.trim(dps3) != '') {
		$.post('_pages/_ajax_st.php', {dps3: dps3}, function(data) {
			$('section#dps3box').text(data);
		});
	}
});
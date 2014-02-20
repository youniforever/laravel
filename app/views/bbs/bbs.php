<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<style>
		body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, form, fieldset, p, button, input {
			margin:0; 
			padding:0; 
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			color: #050505;
		}
		.bbs-list {margin:0 auto; width:100%; height:100%; border-spacing:initial;}
		.bbs-list thead th {text-align:center; padding:10px 0 10px 0; background-color:#E6E6E6;}
		.bbs-list tbody td {height:30px;}
		.bbs-list tbody td:first-child {text-align:center; padding:0;}
		.bbs-list tbody td:nth-child(2) {text-align:left; padding:0;}
		.bbs-list tbody td:last-child {text-align:center; padding:0;}
		.bbs-list tbody .title {}
		.bbs-list tbody .wrote-date {font-size:0.3em;}
		
		.btn {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			color: #050505;
			padding: 10px 20px;
			background: -moz-linear-gradient(
				top,
				#f7ff00 0%,
				#ffbf00);
			background: -webkit-gradient(
				linear, left top, left bottom,
				from(#f7ff00),
				to(#ffbf00));
			-moz-border-radius: 11px;
			-webkit-border-radius: 11px;
			border-radius: 11px;
			border: 5px solid #000000;
			-moz-box-shadow:
				0px 1px 3px rgba(000,000,000,0.5),
				inset 0px 0px 1px rgba(255,255,255,0.7);
			-webkit-box-shadow:
				0px 1px 3px rgba(000,000,000,0.5),
				inset 0px 0px 1px rgba(255,255,255,0.7);
			box-shadow:
				0px 1px 3px rgba(000,000,000,0.5),
				inset 0px 0px 1px rgba(255,255,255,0.7);
			text-shadow:
				0px -1px 0px rgba(000,000,000,0.4),
				0px 1px 0px rgba(255,255,255,0.3);
		}
	</style>
</head>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(document).ready(function() {
	$(".check-all").click(function() {
		if ( $(this).is(":checked") === true ) {
			$(".check-bbs").attr("checked", true);
		}
		else {
			$(".check-bbs").attr("checked", false);
		}
	});

	/* Button Events */
	$(".btn-write").click(function() {
		location.href = "/bbs/create";
	});
	
	$(".btn-del").click(function() {
		$(".frm").submit();
	});
});
</script>

<body>
	<form class="frm" method="post" action="/bbs">
		<table class="bbs-list">
			<thead>
				<tr>
					<th><input type="checkbox" class="check-all" /></th>
					<th>글제목</th>
					<th>글쓴이</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ( $bbs_list as $seq => $bbs ) { ?>
				<tr>
					<td><input type="checkbox" class="check-bbs" name="bbs_id" value="<?=$bbs->id?>" /></td>
					<td>
						<span class="title"><?=$bbs->title?></span>
						<span class="wrote-date">(<?=date("Y-m-d H:i:s", $bbs->update_date)?>)</span>
					</td>
					<td><?=$bbs->writer?></td>
				</tr>
			<?php } ?>
				<tr>
					<td colspan="3">
						<button class="btn btn-write">글쓰기</button>
						<button class="btn btn-del">삭제</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>

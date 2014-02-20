<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<style>
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,form,fieldset,p,button,input
	{
	margin: 0;
	padding: 0;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #050505;
}
.wrap {
	
}
.wrap dl {
	border: 3px double #ccc;
	padding: 0.5em;
}
.wrap dt {
	float: left;
	clear: left;
	width: 100px;
	text-align: right;
	font-weight: bold;
	color: green;
}
.wrap dt:after {
	content: ":";
}
.wrap dd {
	margin: 0 0 0 110px;
	padding: 0 0 0.5em 0;
}
.inputbox {background-color:#EEE; border:0px;}
input[name=title] {width:80%; height:20px;}
.content {width:80%; height:300px;}
input[name=writer] {width:160px; height:20px;}
.wrap .btn-layer {text-align:center;}

.btn-write {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #050505;
	padding: 10px 20px;
	background: -moz-linear-gradient(top, #f7ff00 0%, #ffbf00);
	background: -webkit-gradient(linear, left top, left bottom, from(#f7ff00),
		to(#ffbf00));
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;
	border: 5px solid #000000;
	-moz-box-shadow: 0px 1px 3px rgba(000, 000, 000, 0.5), inset 0px 0px 1px
		rgba(255, 255, 255, 0.7);
	-webkit-box-shadow: 0px 1px 3px rgba(000, 000, 000, 0.5), inset 0px 0px
		1px rgba(255, 255, 255, 0.7);
	box-shadow: 0px 1px 3px rgba(000, 000, 000, 0.5), inset 0px 0px 1px
		rgba(255, 255, 255, 0.7);
	text-shadow: 0px -1px 0px rgba(000, 000, 000, 0.4), 0px 1px 0px
		rgba(255, 255, 255, 0.3);
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
		$(".frm").submit();
	});
});
</script>

<body>
	<div class="wrap">
		<form class="frm" method="post" action="/bbs">
			<dl>
				<dt>제목</dt>
				<dd>
					<input type="text" class="inputbox" name="title" />
				</dd>
			</dl>
			<dl>
				<dt>내용</dt>
				<dd>
					<textarea class="content inputbox" name="content"></textarea>
				</dd>
			</dl>
			<dl>
				<dt>작성자</dt>
				<dd>
					<input type="text" class="inputbox" name="writer" />
				</dd>
			</dl>
			<div class="btn-layer">
				<button class="btn-write">작성완료</button>
			</div>
		</form>
	</div>
</body>
</html>

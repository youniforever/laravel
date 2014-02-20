@section("content")
	<script type="text/javascript">
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

	<form class="frm form-horizontal" method="post" action="/bbs" role="form">
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">제목</label>
			<div class="col-sm-6">
				<input type="input" class="form-control" id="inputPassword" name="title" placeholder="제목">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">내용</label>
			<div class="col-sm-8">
				<textarea class="form-control" rows="3" name="content" placeholder="내용"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">작성자</label>
			<div class="col-sm-4">
				<input type=""input"" class="form-control" id="inputPassword" name="writer" placeholder="작성자명">
			</div>
		</div>
		<div class="form-group">
			<p class="text-center">
				<button type="button" class="btn btn-primary btn-write">작성완료</button>
			</p>
		</div>
	</form>
@stop
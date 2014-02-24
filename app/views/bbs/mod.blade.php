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

	<form class="frm form-horizontal" method="post" action="/bbs/modify-ok" role="form">
		<input type="hidden" name="bbs_id" value="{{ $bbs_info->bbs_id }}" />
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">제목</label>
			<div class="col-sm-6">
				<input type="input" class="form-control" id="inputPassword" name="title" value="{{ $bbs_info->bbs_row->title }}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">내용</label>
			<div class="col-sm-8">
				<textarea class="form-control" rows="3" name="content">{{ $bbs_info->bbs_row->content }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">작성자</label>
			<div class="col-sm-4">
				<input type="input" class="form-control" id="inputPassword" name="writer" value="{{ $bbs_info->bbs_row->writer }}">
			</div>
		</div>
		<div class="form-group">
			<p class="text-center">
				<button type="button" class="btn btn-primary btn-write">수정완료</button>
			</p>
		</div>
	</form>
@stop
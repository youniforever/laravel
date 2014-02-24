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
		$(".btn-modify").click(function() {
			location.href = "/bbs/" + $(this).attr("bbs_id") + "/mod";
		});

		$(".btn-delete").click(function() {
			$.ajax({
				url: "/bbs/delete",
				type: "POST",
				data: $(".check-bbs").serialize(),
				dataType: "json",
				success: function(result) {
					if ( result === true ) {
						alert("삭제됐습니다.");
						location.href = "/bbs";
						return true;
					}
					else {
						alert("삭제하는 도중 지연이 발생했습니다.\n잠시 후 다시 이용해주세요.");
						return false;
					}
				},
				error: function() {}
			});
		});
	});
	</script>

	<form class="frm form-horizontal" method="post" action="/bbs/modify-ok" role="form">
		<input type="hidden" class="check-bbs" name="bbs_id[]" value="{{ $bbs_info->bbs_id }}" />
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">제목</label>
			<div class="col-sm-6">
				<input type="input" class="form-control" id="inputPassword" name="title" value="{{ $bbs_info->bbs_row->title }}" disabled >
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">내용</label>
			<div class="col-sm-8">
				<textarea class="form-control" rows="3" name="content" disabled>{{ $bbs_info->bbs_row->content }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">작성자</label>
			<div class="col-sm-4">
				<input type="input" class="form-control" id="inputPassword" name="writer" value="{{ $bbs_info->bbs_row->writer }}" disabled>
			</div>
		</div>
		<div class="form-group">
			<p class="text-center">
				<button type="button" class="btn btn-primary btn-modify" bbs_id="{{ $bbs_info->bbs_id }}">수정</button>
				<button type="button" class="btn btn-primary btn-delete">삭제</button>
			</p>
		</div>
	</form>
@stop
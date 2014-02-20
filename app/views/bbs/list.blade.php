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
				location.href = "/bbs/create";
			});
			
			$(".btn-del").click(function() {
				$(".frm").submit();
			});
		});
	</script>


	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th><input type="checkbox" class="check-all" /></th>
				<th>글제목</th>
				<th>글내용</th>
				<th>글쓴이</th>
				<th>작성시간</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $bbs_list->list as $seq => $bbs )
			<tr>
				<td><input type="checkbox" class="check-bbs" name="bbs_id"
					value="&lt;?=$bbs-&gt;id?&gt;" /></td>
				<td>{{ $bbs->title }}</td>
				<td>{{ mb_strcut($bbs->content, 0, 20) }}</td>
				<td>{{ $bbs->writer }}</td>
				<td>{{ date("Y-m-d H:i:s", $bbs->update_date) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	<p class="text-center">
	[1]
	</p>
	
	<p class="text-right">
		<button class="btn btn-write">글쓰기</button>
		<button class="btn btn-del">삭제</button>
	</p>
@stop
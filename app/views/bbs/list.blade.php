@section("content")
	<script type="text/javascript">
		$(document).ready(function() {
			var page = 1;

			function bbs_list() {
				$.ajax({
					url: "/bbs/bbs-data",
					type: "GET",
					data: {"page":page},
					dataType: "json",
					success: function(bbs_info) {
						var append = '';
						bbs_lists = bbs_info.list.data;
						$(".page-bar *").remove();
						$(".page-bar").append(bbs_info.links);
						
						if ( $(bbs_lists).length > 0 ) {
							$(bbs_lists).each(function(index, bbs_list) {
								append += '<tr>';
								append += '<td><input type="checkbox" class="check-bbs" name="bbs_id[]" value="' + bbs_list.id + '" /></td>';
								append += '<td><a href="/bbs/' + bbs_list.id + '">' + bbs_list.title + '</a></td>';
								append += '<td>' + bbs_list.content + '</td>';
								append += '<td>' + bbs_list.writer + '</td>';
								append += '<td>' + bbs_list.update_date + '</td>';
								append += '<td>';
								append += '<button type="button" class="glyphicon glyphicon-pencil ico-bbs-mod" bbs_id="' + bbs_list.id + '"></button>&nbsp;';
								append += '<button type="button" class="glyphicon glyphicon-remove ico-bbs-del" bbs_id="' + bbs_list.id + '"></button>';
								append += '</td>';
								append += '</tr>';
							});
						}
						else {
							append += '<tr>';
							append += '<td class="text-center" colspan="6">등록된 글이 없습니다.</td>';
							append += '</tr>';
						}
						
						$(".frm table tbody *").remove();
						$(".frm table tbody").append(append);

						$(".ico-bbs-mod").click(function() {
							location.href = "/bbs/" + $(this).attr("bbs_id") + "/mod";
						});
						
						$(".ico-bbs-del").click(function() {
							bbs_id = $(this).attr("bbs_id");
							$(".check-bbs[value=" + bbs_id + "]").attr("checked", true)
							bbs_del();
						});

						$(".pagination .btn-page").click(function() {
							pg = $(this).attr("value").charCodeAt(0);
							if ( pg == 171 ) {	// <<
								page --;
							}
							else if ( pg == 187 ) {	// >>
								page ++;
							}
							else {
								page = $(this).attr("value");
							}
							bbs_list();
						});
					},
					error: function() {}
				});
			}
			bbs_list();

			function bbs_del() {
				if ( $(".check-bbs:checked").length <= 0 ) {
					alert("먼저 삭제할 목록을 선택해주세요.");
					return false;
				}
				
				$.ajax({
					url: "/bbs/delete",
					type: "POST",
					data: $(".check-bbs:checked").serialize(),
					dataType: "json",
					success: function(result) {
						if ( result === true ) {
							alert("삭제됐습니다.");
							bbs_list();
							return true;
						}
						else {
							alert("삭제하는 도중 지연이 발생했습니다.\n잠시 후 다시 이용해주세요.");
							return false;
						}
					},
					error: function() {}
				});
			}


			/* Button Events */
			$(".check-all").click(function() {
				if ( $(this).is(":checked") === true ) {
					$(".check-bbs").attr("checked", true);
				}
				else {
					$(".check-bbs").attr("checked", false);
				}
			});
			
			
			
			$(".btn-write").click(function() {
				location.href = "/bbs/write";
			});
			
			$(".btn-del").click(function() {
				bbs_del();
			});
		});

	</script>

	<form class="frm">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th><input type="checkbox" class="check-all" /></th>
					<th>글제목</th>
					<th>글내용</th>
					<th>글쓴이</th>
					<th>작성/수정시간</th>
					<th>수정</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</form>
	
	<div class="text-center page-bar"></div>
	
	<p class="text-right">
		<button class="btn btn-write">글쓰기</button>
		<button class="btn btn-del">삭제</button>
	</p>
@stop
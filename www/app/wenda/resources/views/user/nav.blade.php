<link rel="stylesheet" type="text/css" href="{{asset('static/css/user_nav.css')}}">
<ul class="tabs_list clearfix">
			<li @if($class=='dynamic') class='tab  pointer' @else class='tab' @endif>
				
				<a href="/dynamic/{{$uid}}"><span>动态</span></a>

			</li>

			<li @if($class=='notice') class='tab  pointer' @else class='tab' @endif>
				<a href="/notice/{{$uid}}">
					<span>邀请<font>{{$cache_total['message']}}</font></span>
				</a>
			</li>

			<li @if($class=='question') class='tab  pointer' @else class='tab' @endif>
				<a href="/ask/{{$uid}}"><span>提问<font>{{$cache_total['question_total']}}</font></span></a>
			</li>
			<li @if($class=='answer') class='tab  pointer' @else class='tab' @endif>
				<a href="/cans/{{$uid}}">
				<span>回答<font>{{$cache_total['answer_total']}}</font></span>
				</a>
			</li>
			
			@if($baseinfo['id'] == $uid)
			<li  @if($class=='collection') class='tab  pointer' @else class='tab' @endif>
				<a href="/col"><span>收藏<font>{{$cache_total['favorite_total']}}</font></span></a>
				
			</li>
			<li @if($class=='careuser') class='tab  pointer' @else class='tab' @endif>
			<a href="/careuser">
			<span>关注</span>
			</a>
			</li>
			@endif
		</ul>
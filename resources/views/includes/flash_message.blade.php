@if(Session::has('post_form_message'))
	<div class='alert alert-success col-sm-8'>
		<p>{{session('post_form_message')}}</p>
	</div>
@endif
@if(Session::has('category_form_message'))
	<div class='alert alert-success col-sm-8'>
		<p>{{session('category_form_message')}}</p>
	</div>
@endif
@if(Session::has('comment_message'))
	<div class='alert alert-success col-sm-8'>
		<p>{{session('comment_message')}}</p>
	</div>
@endif
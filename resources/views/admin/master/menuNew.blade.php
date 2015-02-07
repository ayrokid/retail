<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.create_new_menu') }}</h4>
</div>
<div class="modal-body">
	<form id="nForm" role="form" action="" method="post">
      <div class="form-group">
        <label for="nama">{{ Lang::get('admin.name') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="name" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="info">{{ Lang::get('admin.information') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="info" placeholder="{{Lang::get('admin.information')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="link">{{ Lang::get('admin.link') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="link" placeholder="{{Lang::get('admin.link')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="icon">{{ Lang::get('admin.icon') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="icon" placeholder="{{Lang::get('admin.icon')}}" autocomplete="off" />
      </div>
      <div class="form-group">
      	<label for="sub-link">{{Lang::get('admin.sub_link')}}</label>
      	<select class="form-control" id="sub-link" required >
      		<option value="">{{ lang::get('admin.select') }}</option>
      		@foreach($data as $val)
      			<option value="{{$val->id}}" >{{ $val->name }}</option>
      		@endforeach
      	</select>
      </div>
    </form>
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
    <button class="btn btn-success save" type="submit">Save Now</button>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.save').click(function(event) {
			var btn = $(this);
			btn.button('loading');
			event.preventDefault();
			$_token = "{{ csrf_token() }}";
			var post = {
				name: $('#name').val(), 
				info: $('#info').val(), 
				link: $('#link').val(), 
				icon: $('#icon').val(), 
				sub: $('#sub-link').val(),
				_token: $_token
			};
			$.post('{{url('master/menu/save/i')}}', post, function(data, textStatus, xhr) {
				if(data.back == 'true'){
					$('#myModal').modal('hide');
                    window.location.reload();
				}else{
					alert(data.msg);
				}
        btn.button('reset');
			});
			setTimeout(function () {
          btn.button('reset');
      }, 3000);
		});
	});
</script>
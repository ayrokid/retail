<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.edit_merk') }}</h4>
</div>
<div class="modal-body">
	<form id="nForm" role="form" action="" method="post">
      <div class="form-group">
        <label for="name">{{ Lang::get('admin.name') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="name" value="{{$data->name}}" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
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
				_token: $_token
			};
			$.post('{{url("master/merk/save/$data->id")}}', post, function(data, textStatus, xhr) {
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
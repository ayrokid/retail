<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.create_new_warehouse') }}</h4>
</div>
<div class="modal-body">
	<form id="nForm" role="form" action="" method="post">
      <div class="form-group">
        <label for="name">{{ Lang::get('admin.name') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="name" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="address">{{ Lang::get('admin.address') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="address" placeholder="{{Lang::get('admin.address')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="telepon">{{ Lang::get('admin.telepon') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="telepon" placeholder="{{Lang::get('admin.location')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="hp">{{ Lang::get('admin.hp') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="hp" placeholder="" autocomplete="off" />
      </div>
      <div class="form-group">
      	<label for="kecamatan">{{Lang::get('admin.kecamatan')}}</label>
      	<select class="form-control" id="kecamatan" required >
      		<option value="">{{ lang::get('admin.select') }}</option>
      		@foreach($kecamatan as $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>  
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
				name   : $('#name').val(), 
				address: $('#address').val(), 
				telepon: $('#telepon').val(), 
				hp     : $('#hp').val(), 
        kecamatan : $('#kecamatan').val(),
				_token : $_token
			};
			$.post('{{url("master/gudang/save/i")}}', post, function(data, textStatus, xhr) {
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
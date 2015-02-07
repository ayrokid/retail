<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.create_new_employee') }}</h4>
</div>
<div class="modal-body">
	<form id="nForm" role="form" action="" method="post">
      <div class="form-group">
        <label for="nik">{{ Lang::get('admin.nik') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="nik" placeholder="{{Lang::get('admin.nik')}}" autocomplete="off" required maxlength="10" />
      </div>
      <div class="form-group">
        <label for="name">{{ Lang::get('admin.name') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="name" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="address">{{ Lang::get('admin.address') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="address" placeholder="{{Lang::get('admin.address')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="propinsi">{{Lang::get('admin.propinsi')}}</label>
        <select class="form-control" id="propinsi" required >
          <option value="">{{ lang::get('admin.select') }}</option>
          @foreach($propinsi as $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>  
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="kota">{{Lang::get('admin.kota')}}</label>
        <select class="form-control" id="kota" required >
          <option value="">{{ lang::get('admin.select') }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="kecamatan">{{Lang::get('admin.kecamatan')}}</label>
        <select class="form-control" id="kecamatan" required >
          <option value="">{{ lang::get('admin.select') }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="telepon">{{ Lang::get('admin.telepon') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="telepon" placeholder="{{Lang::get('admin.telepon')}}" autocomplete="off" maxlength="15" />
      </div>
      <div class="form-group">
        <label for="hp">{{ Lang::get('admin.hp') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="hp" placeholder="" autocomplete="off" maxlength="13" />
      </div>
      <div class="form-group">
        <label for="ktp">{{ Lang::get('admin.ktp') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="ktp" placeholder="" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="bagian">{{Lang::get('admin.bagian')}}</label>
        <select class="form-control" id="bagian" required >
          <option value="">{{ lang::get('admin.select') }}</option>
          @foreach($bagian as $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="gudang">{{Lang::get('admin.warehouse')}}</label>
        <select class="form-control" id="gudang" required >
          <option value="">{{ lang::get('admin.select') }}</option>
          @foreach($gudang as $val)
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
        nik       : $('#nik').val(),
				name      : $('#name').val(), 
				address   : $('#address').val(), 
        kecamatan : $('#kecamatan').val(),
				telepon   : $('#telepon').val(), 
				hp        : $('#hp').val(), 
        ktp       : $('#ktp').val(),
        bagian    : $('#bagian').val(),
        gudang    : $('#gudang').val(),
				_token    : $_token
			};
			$.post('{{url("master/karyawan/save/i")}}', post, function(data, textStatus, xhr) {
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

    $('#propinsi').change(function(){
      $_token = "{{ csrf_token() }}";
      var $_post = {
        field  : 'id',
        param  : $(this).val(),
        _token : $_token
      };
      $.post('{{ url("api/kota") }}', $_post, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        $.each(data, function(id, value){
          $('#kota')
            .append($("<option></option>")
            .attr("value", value.id)
            .text(value.name));
        });
      });
    });

    $('#kota').change(function(){
      $_token = "{{ csrf_token() }}";
      var $_post = {
        field  : 'id',
        param  : $(this).val(),
        _token : $_token
      };
      $.post('{{ url("api/kecamatan") }}', $_post, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        $.each(data, function(id, value){
          $('#kecamatan')
            .append($("<option></option>")
            .attr("value", value.id)
            .text(value.name));
        });
      });
    });

	});
</script>
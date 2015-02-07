<form id="nForm" class="form-horizontal" role="form" action="" method="post">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.new_target') }}</h4>
</div>
<div class="modal-body">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="name">{{ Lang::get('admin.name') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="name" id="name" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
          <input type="hidden" name="karyawan_id" id="karyawan_id" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="tahun">{{ Lang::get('admin.tahun') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="tahun" placeholder="{{Lang::get('admin.tahun')}}" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b1">{{ Lang::get('admin.bulan') }} 01</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b1" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b2">{{ Lang::get('admin.bulan') }} 02</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b2" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b3">{{ Lang::get('admin.bulan') }} 03</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b3" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b4">{{ Lang::get('admin.bulan') }} 04</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b4" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b5">{{ Lang::get('admin.bulan') }} 05</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b5" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b6">{{ Lang::get('admin.bulan') }} 06</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b6" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b7">{{ Lang::get('admin.bulan') }} 07</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b7" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b8">{{ Lang::get('admin.bulan') }} 08</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b8" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b9">{{ Lang::get('admin.bulan') }} 09</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b9" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b10">{{ Lang::get('admin.bulan') }} 10</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b10" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b11">{{ Lang::get('admin.bulan') }} 11</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b11" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="b12">{{ Lang::get('admin.bulan') }} 12</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="b12" autocomplete="off" required />
        </div>
      </div>
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
    <button class="btn btn-success save" type="submit">Save Now</button>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function() {

    $('#name').autocomplete({
        minLength: 2,
        timeout  : 10000,
        source   : function(request, response){
            $_token = "{{ csrf_token() }}";
            var $_post = {
              field  : 'name',
              param  : $('#name').val(),
              _token : $_token
            };
            $.post("{{ url('api/karyawan') }}", $_post, function(data){
                response(data);
            }, 'json' );
        }, select: function(event, arr){
            $('#karyawan_id').val(arr.item.id);
        }, error: function(x,t,m){
            //bootbox.alert(m);
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
                .append( "<a>" + item.label + "<br><strong>" + item.desc + "</strong></a>" )
                .appendTo( ul );
    };

		$('form').submit(function(event) {
			var btn = $('.save');
			btn.button('loading');
			event.preventDefault();
			$.post('{{url("master/target/save/i")}}', $('#nForm').serialize(), function(data, textStatus, xhr) {
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
<form id="nForm" class="form-horizontal" role="form" action="" method="post">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.toko_baru') }}</h4>
</div>
<div class="modal-body">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="name">{{ Lang::get('admin.pelanggan') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="name" id="name" placeholder="{{Lang::get('admin.pelanggan')}}" autocomplete="off" required />
          <input type="hidden" name="pelanggan_id" id="pelanggan_id" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="address">{{ Lang::get('admin.address') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="address" id="address" placeholder="{{Lang::get('admin.address')}}" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="hp">{{ Lang::get('admin.hp') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="hp" id="hp" placeholder="{{Lang::get('admin.hp')}}" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="telepon">{{ Lang::get('admin.telepon') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="telepon" placeholder="{{Lang::get('admin.telepon')}}" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="telepon">{{ Lang::get('admin.telepon') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="telepon" placeholder="{{Lang::get('admin.telepon')}}" autocomplete="off" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="fax">{{ Lang::get('admin.fax') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="fax" placeholder="{{Lang::get('admin.fax')}}" autocomplete="off" required />
        </div>
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
        <select class="form-control" id="kota" name="kota" required >
          <option value="">{{ lang::get('admin.select') }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="kode-pos">{{Lang::get('admin.kode_pos')}}</label>
        <select class="form-control" id="kode-pos" name="kode-pos" required >
          <option value="">{{ lang::get('admin.select') }}</option>
        </select>
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
            $.post("{{ url('api/pelanggan') }}", $_post, function(data){
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
        $.each(data, function(id, value){
          $('#kode-pos')
            .append($("<option></option>")
            .attr("value", value.code)
            .text(value.name));
        });
      });
    });

    $('form').submit(function(event) {
      var btn = $('.save');
      btn.button('loading');
      event.preventDefault();
      $.post('{{url("master/pelanggan/save/i")}}', $('#nForm').serialize(), function(data, textStatus, xhr) {
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
<link rel="stylesheet" type="text/css" href="{{ url() }}/admin/assets/bootstrap-datepicker/css/datepicker.css" />
<form id="nForm" class="form-horizontal" role="form" action="" method="post">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.pelanggan_baru') }}</h4>
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
          <input type="text" class="form-control placeholder-no-fix numeric" name="telepon" placeholder="{{Lang::get('admin.telepon')}}" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="email">{{ Lang::get('admin.e_mail') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="email" class="form-control placeholder-no-fix numeric" name="email" placeholder="{{Lang::get('admin.e_mail')}}" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="fax">{{ Lang::get('admin.fax') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="fax" placeholder="{{Lang::get('admin.fax')}}" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="propinsi">{{Lang::get('admin.propinsi')}}</label>
        <div class="col-lg-10 col-sm-10">
        <select class="form-control" id="propinsi" required >
          <option value="">{{ lang::get('admin.select') }}</option>
          @foreach($propinsi as $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>  
          @endforeach
        </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="kota">{{Lang::get('admin.kota')}}</label>
        <div class="col-lg-10 col-sm-10">
        <select class="form-control" id="kota" name="kota" required >
          <option value="">{{ lang::get('admin.select') }}</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="kode-pos">{{Lang::get('admin.kode_pos')}}</label>
        <div class="col-lg-10 col-sm-10">
          <select class="form-control" id="kode-pos" name="kode-pos" >
            <option value="">{{ lang::get('admin.select') }}</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="gender">{{Lang::get('admin.gender')}}</label>
        <div class="col-lg-10 col-sm-10">
          <?php echo Form::select('gender', gender(), '', array('class'=>'form-control')) ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="marital">{{Lang::get('admin.marital')}}</label>
        <div class="col-lg-10 col-sm-10">
          <?php echo Form::select('marital', marital(), '', array('class'=>'form-control')) ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="agama">{{Lang::get('admin.agama')}}</label>
        <div class="col-lg-10 col-sm-10">
          <?php echo Form::select('agama', agama(), '', array('class'=>'form-control')) ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="tmpt-lahir">{{ Lang::get('admin.born') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix" name="tmpt-lahir" id="tmpt-lahir" placeholder="{{Lang::get('admin.born')}}" autocomplete="off" />
          <input type="hidden" name="tmpt-lahir-id" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="tgl-lahir">{{ Lang::get('admin.tgl_lahir') }}</label>
        <div class="col-lg-5 col-sm-5">
          <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="tgl-lahir" id="tgl-lahir" placeholder="2000-12-31" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="type-id">{{Lang::get('admin.type_id')}}</label>
        <div class="col-lg-10 col-sm-10">
          <?php echo Form::select('type-id', type_id(), '', array('class'=>'form-control')) ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="no-id">{{ Lang::get('admin.no_id') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="no-id" placeholder="{{Lang::get('admin.no_id')}}" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 col-sm-2 control-label" for="npwp">{{ Lang::get('admin.npwp') }}</label>
        <div class="col-lg-10 col-sm-10">
          <input type="text" class="form-control placeholder-no-fix numeric" name="npwp" placeholder="{{Lang::get('admin.npwp')}}" autocomplete="off" />
        </div>
      </div>
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
    <button class="btn btn-success save" type="submit">Save Now</button>
</div>
</form>
<script type="text/javascript" src="{{ url() }}/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{ url() }}/admin/assets/bootstrap-daterangepicker/moment.min.js"></script>

<script type="text/javascript">
  if (top.location != location) {
      top.location.href = document.location.href ;
  }

  $(function(){
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.default-date-picker').datepicker()
            .on('changeDate', function(ev){
                $('.default-date-picker').datepicker('hide');
            });
  });

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

    $('#tmpt-lahir').autocomplete({
        minLength: 2,
        timeout  : 10000,
        source   : function(request, response){
            $_token = "{{ csrf_token() }}";
            var $_post = {
              field  : 'name',
              param  : $('#tmpt-lahir').val(),
              _token : $_token
            };
            $.post("{{ url('api/kota') }}", $_post, function(data){
                response(data);
            }, 'json' );
        }, select: function(event, arr){
            $('#tmpt-lahir-id').val(arr.item.id);
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
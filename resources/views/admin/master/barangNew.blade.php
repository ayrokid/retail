<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ Lang::get('admin.create_new_item') }}</h4>
</div>
<div class="modal-body">
	<form id="nForm" role="form" action="" method="post">
      <div class="form-group">
        <label for="code">{{ Lang::get('admin.code') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="code" placeholder="{{Lang::get('admin.code')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="name">{{ Lang::get('admin.name') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="name" placeholder="{{Lang::get('admin.name')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="barcode">{{ Lang::get('admin.barcode') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="barcode" placeholder="{{Lang::get('admin.barcode')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="location">{{ Lang::get('admin.location') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="location" placeholder="{{Lang::get('admin.location')}}" autocomplete="off" required />
      </div>
      <div class="form-group">
        <label for="price-buy">{{ Lang::get('admin.price_buy') }}</label>
        <input type="text" class="form-control placeholder-no-fix currency" id="price-buy" name="buy" placeholder="00.00" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="price-sell">{{ Lang::get('admin.price_sell') }}</label>
        <input type="text" class="form-control placeholder-no-fix currency" id="price-sell" name="sell" placeholder="00.00" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="piece">{{ Lang::get('admin.piece') }}</label>
        <input type="text" class="form-control placeholder-no-fix" id="piece" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="stock-min">{{ Lang::get('admin.stock_min') }}</label>
        <input type="text" class="form-control placeholder-no-fix currency" id="stock-min" name="min" placeholder="00.00" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="stock-max">{{ Lang::get('admin.stock_max') }}</label>
        <input type="text" class="form-control placeholder-no-fix currency" id="stock-max" name="max" placeholder="00.00" autocomplete="off" />
      </div>
      <div class="form-group">
      	<label for="supplier">{{Lang::get('admin.supplier')}}</label>
      	<select class="form-control" id="supplier" required >
      		<option value="">{{ lang::get('admin.select') }}</option>
      		@foreach($supplier as $val)
          <option value="{{ $val->id }}">{{ $val->sup_name }}</option>  
          @endforeach
      	</select>
      </div>
    </form>
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
    <button class="btn btn-success save" type="submit">Save Now</button>
</div>

<!--common script for all pages-->
<script src="{{ url() }}/admin/js/common-scripts.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.save').click(function(event) {
			var btn = $(this);
			btn.button('loading');
			event.preventDefault();
			$_token = "{{ csrf_token() }}";
			var post = {
        code      : $('#code').val(),
				name      : $('#name').val(), 
				barcode   : $('#barcode').val(), 
				location  : $('#location').val(), 
				price_buy : $('#price-buy').val(), 
				price_sell: $('#price-sell').val(),
        piece     : $('#piece').val(),
        stock_min : $('#stock-min').val(),
        stock_max : $('#stock-max').val(),
        supplier  : $('#supplier').val(),
				_token    : $_token
			};
			$.post('{{url("master/barang/save/i")}}', post, function(data, textStatus, xhr) {
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
@extends('admin.layouts.default')

@section('styles')

@stop

@section('content')
<section class="panel">
<header class="panel-heading">
    {{Lang::get('admin.pelanggan')}}
</header>
<div class="panel-body">
      <table class="easyui-datagrid" id="grid" title="{{Lang::get('admin.pelanggan')}}" style="width: auto;height:450px" rownumbers="true" pagination="true"
        url="<?php echo url('master/pelanggan/grid'); ?>"
        data-options="singleSelect:true,method:'get',toolbar:'#tb'">
        <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'name',width:200">{{Lang::get('admin.name')}}</th>                
            </tr>
        </thead>    
        <thead>
            <tr>
                <th data-options="field:'address',width:350">{{Lang::get('admin.address')}}</th>
                <th data-options="field:'kota',width:200">{{Lang::get('admin.kota')}}</th>
                <th data-options="field:'telepon',width:150">{{Lang::get('admin.telepon')}}</th>
                <th data-options="field:'hp',width:150">{{Lang::get('admin.hp')}}</th>
                <th data-options="field:'update',width:140,align:'right'">{{Lang::get('admin.last_update')}}</th>
                <th data-options="field:'crud',width:100,align:'center'">{{Lang::get('admin.action')}}</th>
            </tr>
        </thead>
      </table>
      <div id="tb">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
              <input type="text" name="cari" class="form-control input-sm" placeholder="{{ Lang::get('admin.search') }}" />
          </div>
          <button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-search"></i> </button>&nbsp;
          <a class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal' href="{{ url('master/pelanggan/new') }}" >
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </a>
      </div>
  </div>
</section>
@stop

@section('scripts')

<script type="text/javascript">
  if (top.location != location) {
      top.location.href = document.location.href ;
  }

  $(function(){
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.dpYears').datepicker();
    $('.dpMonths').datepicker();
  });

  $(document).ready(function() {
    $('input[name="cari"]').keyup(function(event) {
      $('#grid').datagrid('load',{
          cari : $('input[name="cari"]').val()
      });
    });
  });
</script>
@stop
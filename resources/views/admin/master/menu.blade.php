@extends('admin.layouts.default')

@section('content')
<section class="panel">
<header class="panel-heading">
    {{Lang::get('admin.menu_grid')}}
</header>
<div class="panel-body">
      <table class="easyui-datagrid" id="grid" title="{{Lang::get('admin.menu_grid')}}" style="width: auto;height:450px"
        rownumbers="true" pagination="true"
        url="<?php echo url('api/menu'); ?>"
        data-options="singleSelect:true,method:'get',toolbar:'#tb'">
        <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'name',width:150">{{Lang::get('admin.name')}}</th>
                <th data-options="field:'info',width:300">{{Lang::get('admin.information')}}</th>
            </tr>
        </thead>    
        <thead>
            <tr>
                <th data-options="field:'link',width:300">{{Lang::get('admin.link')}}</th>
                <th data-options="field:'update',width:140,align:'right'">{{Lang::get('admin.last_update')}}</th>
                <th data-options="field:'crud',width:150,align:'center'">{{Lang::get('admin.action')}}</th>
            </tr>
        </thead>
      </table>
      <div id="tb">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
              <input type="text" name="cari" class="form-control input-sm" placeholder="{{ Lang::get('admin.search') }}" />
          </div>
          <button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-search"></i> </button>&nbsp;
          <a class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal' href="{{ url('master/menu/new') }}" >
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </a>
      </div>
  </div>
</section>
@stop

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('input[name="cari"]').keyup(function(event) {
      $('#grid').datagrid('load',{
          cari : $('input[name="cari"]').val()
      });
    });
  });
</script>
@stop
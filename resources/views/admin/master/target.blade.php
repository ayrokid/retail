@extends('admin.layouts.default')

@section('content')
<section class="panel">
<header class="panel-heading">
    {{Lang::get('admin.target')}}
</header>
<div class="panel-body">
      <table class="easyui-datagrid" id="grid" title="{{Lang::get('admin.target')}}" style="width: auto;height:450px"
        rownumbers="true" pagination="true"
        url="<?php echo url('master/target/grid'); ?>"
        data-options="singleSelect:true,method:'get',toolbar:'#tb'">
        <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'name',width:200">{{Lang::get('admin.karyawan').' '.Lang::get('admin.name')}}</th>
            </tr>
        </thead>    
        <thead>
            <tr>
                <th data-options="field:'tahun',width:100">{{Lang::get('admin.tahun')}}</th>
                <th data-options="field:'b1',width:100,align:'right'">{{Lang::get('admin.bulan')}} 01</th>
                <th data-options="field:'b2',width:100,align:'right'">{{Lang::get('admin.bulan')}} 02</th>
                <th data-options="field:'b3',width:100,align:'right'">{{Lang::get('admin.bulan')}} 03</th>
                <th data-options="field:'b4',width:100,align:'right'">{{Lang::get('admin.bulan')}} 04</th>
                <th data-options="field:'b5',width:100,align:'right'">{{Lang::get('admin.bulan')}} 05</th>
                <th data-options="field:'b6',width:100,align:'right'">{{Lang::get('admin.bulan')}} 06</th>
                <th data-options="field:'b7',width:100,align:'right'">{{Lang::get('admin.bulan')}} 07</th>
                <th data-options="field:'b8',width:100,align:'right'">{{Lang::get('admin.bulan')}} 08</th>
                <th data-options="field:'b9',width:100,align:'right'">{{Lang::get('admin.bulan')}} 09</th>
                <th data-options="field:'b10',width:100,align:'right'">{{Lang::get('admin.bulan')}} 10</th>
                <th data-options="field:'b11',width:100,align:'right'">{{Lang::get('admin.bulan')}} 11</th>
                <th data-options="field:'b12',width:100,align:'right'">{{Lang::get('admin.bulan')}} 12</th>
                <th data-options="field:'update',width:150,align:'right'">{{Lang::get('admin.last_update')}}</th>
                <th data-options="field:'crud',width:100,align:'center'">{{Lang::get('admin.action')}}</th>
            </tr>
        </thead>
      </table>
      <div id="tb">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
              <input type="text" name="cari" class="form-control input-sm" placeholder="{{ Lang::get('admin.search') }}" />
          </div>
          <button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-search"></i> </button>&nbsp;
          <a class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal' href="{{ url('master/target/new') }}" >
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
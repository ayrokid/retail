@extends('admin.layouts.default')

@section('content')
<section class="panel">
<header class="panel-heading">
    Classic Search
</header>
<div class="panel-body">
      <table class="easyui-datagrid" title="Category Grid" style="width: auto;height:400px"
        rownumbers="true" pagination="true"
        url="<?php echo url('api/menu'); ?>"
        data-options="singleSelect:true,collapsible:true,method:'get',toolbar:'#tb'">
        <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'name',width:200">{{Lang::get('admin.name')}}</th>
                <th data-options="field:'info',width:200">{{Lang::get('admin.information')}}</th>
            </tr>
        </thead>    
        <thead>
            <tr>
                <th data-options="field:'link',width:250">{{Lang::get('admin.link')}}</th>
                <th data-options="field:'update',width:150,align:'right'">Last Update</th>
                <th data-options="field:'crud',width:150,align:'center'">Action</th>
            </tr>
        </thead>
      </table>
      <div id="tb">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
              <div class="input-group">
                  <input type="text" id="dpd1" name="from" class="form-control input-sm" value="" />
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
          </div>
          <button type='button' class='btn btn-success btn-sm'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
      </div>
  </div>
</section>
@stop
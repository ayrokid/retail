@extends('admin.layouts.default')
@section('content')
<section class="wrapper">
  <div class="row">
        <div class="col-lg-8">
            <!--custom chart start-->
            <div class="border-head">
                <h3>Earning Graph</h3>
            </div>
            <div class="custom-bar-chart">
                <ul class="y-axis">
                    <li><span>100</span></li>
                    <li><span>80</span></li>
                    <li><span>60</span></li>
                    <li><span>40</span></li>
                    <li><span>20</span></li>
                    <li><span>0</span></li>
                </ul>
                <div class="bar">
                    <div class="title">JAN</div>
                    <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                </div>
                <div class="bar ">
                    <div class="title">FEB</div>
                    <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                </div>
                <div class="bar ">
                    <div class="title">MAR</div>
                    <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                </div>
                <div class="bar ">
                    <div class="title">APR</div>
                    <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                </div>
                <div class="bar">
                    <div class="title">MAY</div>
                    <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                </div>
                <div class="bar ">
                    <div class="title">JUN</div>
                    <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                </div>
                <div class="bar">
                    <div class="title">JUL</div>
                    <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                </div>
                <div class="bar ">
                    <div class="title">AUG</div>
                    <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                </div>
                <div class="bar ">
                    <div class="title">SEP</div>
                    <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                </div>
                <div class="bar ">
                    <div class="title">OCT</div>
                    <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                </div>
                <div class="bar ">
                    <div class="title">NOV</div>
                    <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                </div>
                <div class="bar ">
                    <div class="title">DEC</div>
                    <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                </div>
            </div>
            <!--custom chart end-->
        </div>
        <div class="col-lg-4">
            <!--new earning start-->
            <div class="panel terques-chart">
                <div class="panel-body chart-texture">
                    <div class="chart">
                        <div class="heading">
                            <span>Friday</span>
                            <strong>$ 57,00 | 15%</strong>
                        </div>
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                    </div>
                </div>
                <div class="chart-tittle">
                    <span class="title">New Earning</span>
                    <span class="value">
                        <a href="#" class="active">Market</a>
                        |
                        <a href="#">Referal</a>
                        |
                        <a href="#">Online</a>
                    </span>
                </div>
            </div>
            <!--new earning end-->

            
        </div>
    </div>
     <section class="panel">
        <header class="panel-heading">
            Classic Search
        </header>
        <div class="panel-body">
              <table class="easyui-datagrid" title="Basic DataGrid" style="width: auto;height:300px;"
                     data-options="singleSelect:true,url:'<?php echo url('admin/assets/easyui/datagrid_data1.json'); ?>',method:'get',toolbar:'#tb'">
                  <thead>
                      <tr>
                          <th data-options="field:'itemid',width:80">Item ID</th>
                          <th data-options="field:'productid',width:100">Product</th>
                          <th data-options="field:'listprice',width:80,align:'right'">List Price</th>
                          <th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
                          <th data-options="field:'attr1',width:250">Attribute</th>
                          <th data-options="field:'status',width:100,align:'center'">Status</th>
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
</section>
@stop

@section('scripts')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ url() }}/admin/js/jquery-1.8.3.min.js"></script>
<script src="{{ url() }}/admin/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{ url() }}/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{ url() }}/admin/js/owl.carousel.js" ></script>
<script src="{{ url() }}/admin/js/jquery.customSelect.min.js" ></script>

<!--script for this page-->
<script src="{{ url() }}/admin/js/sparkline-chart.js"></script>
<script src="{{ url() }}/admin/js/easy-pie-chart.js"></script>
<script src="{{ url() }}/admin/js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>
@stop
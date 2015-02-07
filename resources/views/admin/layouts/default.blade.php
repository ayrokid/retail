<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      @section('title')
      {{ system_name() }}
      @show
    </title>
    @section('meta_keywords')
    <meta name="keywords" content="your, awesome, keywords, here" />
    @show
    @section('meta_author')
    <meta name="author" content="Jon Doe" />
    @show
    @section('meta_description')
    <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />
    @show
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ url() }}/admin/assets/easyui/themes/metro/easyui.css" rel="stylesheet" />
    <link href="{{ url() }}/admin/css/bootstrap.css" rel="stylesheet">
    <link href="{{ url() }}/admin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{ url() }}/admin/assets/easyui/themes/metro/datagrid.css" rel="stylesheet" />
    <!--external css-->
    <link href="{{ url() }}/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ url() }}/admin/assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ url() }}/admin/css/style.css" rel="stylesheet">
    <link href="{{ url() }}/admin/css/style-responsive.css" rel="stylesheet" />
    @section('styles')

    @show
    <script src="{{ url() }}/admin/js/jquery-1.8.3.min.js"></script>
    <script src="{{ url() }}/admin/assets/easyui/jquery.easyui.min.js" ></script>
    <script src="{{ url() }}/admin/js/jquery-ui-1.9.2.custom.min.js" ></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ url('home') }}" class="logo">Sun<span>lab</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 6 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Dashboard v1.3</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>                            
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{ url() }}/admin/img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Server #3 overloaded.
                                    <span class="small italic">34 mins</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ url() }}/admin/img/avatar1_small.jpg">
                            <span class="username">{{{ Auth::user()->name }}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                            <li>
                                <a href="{{{ URL::to('auth/logout') }}}">
                                    <i class="fa fa-key"></i> {{ Lang::get('site.logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="{{ url('home') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <?php $menu = menu(0); ?>

                  @foreach($menu as $row)
                  <li class="sub-menu">
                      <?php $sub = menu($row->id); ?>
                      @if(count($sub) > 0)
                        <a href="javascript:;" class="{{ (Request::segment(1) == $row->name)? 'active' : '' }}" >
                      @else
                        <a href="{{ url($row->link) }}" >
                      @endif                      
                          <i class="fa fa-laptop"></i>
                          <span>{{ $row->name }}</span>
                      </a>
                      @foreach($sub as $val)
                      <ul class="sub">
                          <li><a href="{{ url($val->link) }}">{{ $val->name }}</a></li>
                      </ul>
                      @endforeach
                  </li>
                  @endforeach                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <!-- page start-->
          <section class="wrapper site-min-height">
              <div class="row">
                      <div class="col-lg-12">
                          <!--breadcrumbs start -->
                          <ul class="breadcrumb">
                              <li><a href="{{ URL::to('home') }}"><i class="fa fa-home"></i> {{ Lang::get('site.home') }}</a></li>
                              @if(Request::segment(2) != '' && Request::segment(3) != '')
                              <li>
                              <a href="{{ URL::to(Request::segment(2)) }}"> {{ str_replace('-',' ',Request::segment(2)) }}</a>
                              </li>
                              @else
                              <li class="active">{{ str_replace('-',' ',Request::segment(2)) }}</li>
                              @endif
                              @if(Request::segment(3) != '')
                              <li class="active">{{str_replace('-',' ',Request::segment(3))}}</li>
                              @endif
                          </ul>
                          <!--breadcrumbs end -->
                      </div>
                 </div>
                
                  @yield('content')
                
            </section>
          <!-- page end-->             
      </section>
      <!--main content end-->

      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  
              </div>
          </div>
      </div>
      <!-- modal -->
      
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ url() }}/admin/js/bootstrap.min.js"></script>    
    <script class="include" type="text/javascript" src="{{ url() }}/admin/js/jquery.dcjqaccordion.2.7.js"></script>

    <script src="{{ url() }}/admin/js/jquery.scrollTo.min.js"></script>
    <script src="{{ url() }}/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="{{ url() }}/admin/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="{{ url() }}/admin/js/common-scripts.js"></script>

    @yield('scripts')

  </body>
</html>

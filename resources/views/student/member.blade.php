@extends('layouts.admin')

@section('title','学生列表')

@section('content')


 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Projects <small>Listing design</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
				
			@if (Session::get('success'))
			<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>恭喜、</strong> {{ Session::get('success') }}.
                  </div>
			@endif	
				
			@if (Session::get('error'))
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>对不起、</strong> {{ Session::get('error') }}.
                  </div>
			@endif	
				
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>
                    <a href="{{ url('student/create') }}" class="btn btn-info">添加</a>
                    Simple table with project listing with progress and editing options</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Project Name</th>
                          <th>Team Members</th>
                          <th>Project Progress</th>
                          <th>Status</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($members as $member)
                        <tr>
                          <td>#</td>
                          <td>
                            <a>{{ $member->name }}</a>
                            <br />
                            <small>Created {{ date('Y-m-d H:i:s',$member->created_at) }}</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <img src="{{ asset('images/user.png') }}" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="{{ asset('images/user.png') }}" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="{{ asset('images/user.png') }}" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="{{ asset('images/user.png') }}" class="avatar" alt="Avatar">
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            {{ $member->sex($member->sex) }}
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Success</button>
                          </td>
                          <td>
                            <a href="{{ url('student/detail',['id'=>$member->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="{{ url('student/update',['id'=>$member->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="{{ url('student/delete',['id'=>$member->id]) }}" onclick="if(confirm('确认删除吗?')==false) return false;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                  <div style="text-align: right;">
                  		 {{ $members->render() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


@stop
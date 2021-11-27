@extends('layouts.admin')

@section('content')


<div class="row" style="margin-top:20px"> 
     <div class="col-xl-12"> 
     </div> 
</div>
      
       <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>Lista de Roles</h5>
                            </div>

                         
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                                    <thead>
                                        <tr>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $item)
                                          <tr>
                                           <td style="color:black;padding:10px">{{ $item->description }}</td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->


@endsection
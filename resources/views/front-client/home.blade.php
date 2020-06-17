@extends('front-client.layouts.masterClient')

@section('title', 'Home')

@section('content')
     <div class="container-fluid">
		<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total bookings</span>
                <span class="info-box-number">{{ $totalBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-handshake"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Confirmed bookings</span>
                    <span class="info-box-number">{{ $confirmedBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-user-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending bookings</span>
                <span class="info-box-number">{{ $pendingBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cancelled bookings</span>
                <span class="info-box-number">{{ $cancelBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

	<!-- Nutritional tip -->
		<br><br>
		<h4><i>Nutritional tip of the day...</i></h4>
		<div class="card">
        <div class="card-header">
          <h4 class="card-title"><i>From: Janem Doe</i></h4>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          	<div class="col-10">
          		Start creating your amazing application!
          	</div>
          	<div class="">time ago</div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- comments -->
    <div class="card">
         <!-- form start -->
         <form class="form-horizontal">
            <div class="card-body">
               	<div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                <button type="button" class="btn bg-gradient-primary btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /.container-fluid -->
@endsection
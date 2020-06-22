@extends('layouts.master')

@section('title', 'Income reports')

@section('content')
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title">Income overview</h3>

          <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">
                Shs. {{ $totalPayments }}
            </span>
            <span>Income Over Time</span>
          </p>
          {{-- <p class="ml-auto d-flex flex-column text-right">
            @if($totalPayments)
            <span class="text-success">
              <i class="fas fa-arrow-up"></i> 12.5%
            </span>
            @endif
            <span class="text-muted">Since last Month</span>
          </p> --}}
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          {{-- <canvas id="visitors-chart" height="200" width="445" class="chartjs-render-monitor" style="display: block; width: 445px; height: 200px;"></canvas> --}}
              {{-- Chart goes here --}}
          {!! $salesChart->renderHtml() !!}
        </div>
      </div>
    </div>
      <!-- ./card-body -->
@endsection
@section('js')
    {!! $salesChart->renderChartJsLibrary() !!}
    {!! $salesChart->renderJs() !!}
@endsection
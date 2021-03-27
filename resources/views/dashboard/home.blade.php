@extends('dashboard.base')

@section("pagenow",'Home')
@section('content')

 <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">PRINCIPAL</h6>
                      <span class="font-weight-bold mb-0">{{$prin}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-orange text-white">
                        <i class="fas fa-hockey-puck"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> @if ($total > 0)
                      {{ round((intval($prin)*100)/$total,PHP_ROUND_HALF_DOWN)}}%
                    @endif</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">MINSA</h6>
                      <span class="font-weight-bold mb-0">{{$min}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-cyan text-white">
                        <i class="fas fa-hockey-puck"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> @if ($total > 0)
                      {{ round((intval($min)*100)/$total,PHP_ROUND_HALF_DOWN)}}%
                    @endif</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
         
            <div class="col-xl-4 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">CONDICION</h6>
                      <span class="font-weight-bold mb-0">{{$con}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-orange text-white">
                        <i class="fas fa-hockey-puck"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> @if ($total > 0)
                      {{ round((intval($con)*100)/$total,PHP_ROUND_HALF_DOWN)}}%
                    @endif</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>






<div class="row">
     <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">2PERSONNEL</h6>
                      <span class="font-weight-bold mb-0">{{$per}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-green text-white">
                        <i class="fas fa-tablets"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> @if ($total > 0)
                      {{ round((intval($per)*100)/$total,PHP_ROUND_HALF_DOWN)}}%
                    @endif</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>

              <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">TIPO REGISTRO</h6>
                      <span class="font-weight-bold mb-0">{{$treg}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-green text-white">
                        <i class="fas fa-tablets"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 
                      @if ($total > 0)
                      {{ round((intval($treg)*100)/$total,PHP_ROUND_HALF_DOWN)}}%
                    @endif</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
</div>
@endsection

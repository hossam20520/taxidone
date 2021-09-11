<div class="row">
    <!-- Left col -->
    <div class="col-md-4">
      <!-- MAP & BOX PANE -->

      <!-- /.card -->
      <div class="row">

        <!-- /.col -->

        <div class="col-md-12">
          <!-- USERS LIST -->



          
          <div class="card Latest_Members">
            <div class="card-header">
              <h3 class="card-title">المستخدمين</h3>

              {{-- <div class="card-tools">
                <span class="badge badge-danger">8 New Members</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="users-list clearfix">

                {{-- @foreach ($lastUsers as $item) --}}
                <li>
                  <img src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png" alt="User Image">
                  <a class="users-list-name" href="#">Hossam</a>
                  <span class="users-list-date">Driver</span>
                </li>

                <li>
                  <img src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png" alt="User Image">
                  <a class="users-list-name" href="#">Hossam</a>
                  <span class="users-list-date">Driver</span>
                </li>


                <li>
                  <img src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png" alt="User Image">
                  <a class="users-list-name" href="#">Hossam</a>
                  <span class="users-list-date">client</span>
                </li>



                <li>
                  <img src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png" alt="User Image">
                  <a class="users-list-name" href="#">Hossam</a>
                  <span class="users-list-date">Driver</span>
                </li>


           
                {{-- @endforeach --}}
             
                
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center showAllV">
              <a href="#">{{ trans('dash.dash.viewAlU') }}</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!--/.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- TABLE: LATEST ORDERS -->

      <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-8">
      <!-- Info Boxes Style 2 -->
      <div class="info-box mb-3 bg-danger rejeca">
        <span class="info-box-icon"><i class="fa-fw nav-icon fas fa-star"></i></span>
 
        <div class="info-box-content">
          <span class="info-box-text">اجمالي التقييمات</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box mb-3 bg-success waitingDel">
        <span class="info-box-icon"><i class="fa-fw nav-icon fas fa-star"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">التقييمات الحاصلة على 5 نجوم</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box mb-3 bg-danger total_orders">
        <span class="info-box-icon"><i class="fa-fw nav-icon fas fa-star"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">التقيمات الحاصلة على 4 نجوم</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box mb-3 bg-info wholese">
        <span class="info-box-icon"><i class="fa-fw nav-icon fas fa-star"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">التقيمات الحاصلة على نجمة</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  <div class="row">

    <div class="col-md-12">
        <div class="card latestorders" >
            <div class="card-header border-transparent">
              <h3 class="card-title">{{ trans('dash.dash.laor') }}</h3>
    
              {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th class="orderIda">رقم الرحلة</th>
                    <th class="nameus">تكلفة الرحلة</th>
                    <th class="PhoneUsers">البريد الالكتروني</th>
                    <th class="statusName">حالة الرحلة</th>
                    <th class="TotalCosts">العميل</th>
                  </tr>
                  </thead>
                  <tbody>

        {{-- @foreach ($lastOrders as $item) --}}
        <tr>
          
          <td><a href="#">1</a></td>
          <td>100</td>
          <td>hossam@gmail.com</td>

          {{-- @if ($item->status == "cancelled") --}}
          <td><span class="badge badge-danger">ملغية</span></td>
          {{-- @endif --}}
         

          {{-- @if ($item->status == "delivered")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "pending")
          <td><span class="badge badge-warning">{{ $item->status }}</span></td>
          @endif
          

          @if ($item->status == "accepted")
          <td><span class="badge badge-info">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "shippedAwaitingDelivery")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif --}}

          <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">ِAhmed</div>
          </td>
        </tr>


        <tr>
          
          <td><a href="#">1</a></td>
          <td>100</td>
          <td>hossam@gmail.com</td>

          {{-- @if ($item->status == "cancelled") --}}
          <td><span class="badge badge-danger">ملغية</span></td>
          {{-- @endif --}}
         

          {{-- @if ($item->status == "delivered")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "pending")
          <td><span class="badge badge-warning">{{ $item->status }}</span></td>
          @endif
          

          @if ($item->status == "accepted")
          <td><span class="badge badge-info">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "shippedAwaitingDelivery")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif --}}

          <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">ِAhmed</div>
          </td>
        </tr>



        <tr>
          
          <td><a href="#">1</a></td>
          <td>100</td>
          <td>hossam@gmail.com</td>

          {{-- @if ($item->status == "cancelled") --}}
          <td><span class="badge badge-danger">ملغية</span></td>
          {{-- @endif --}}
         

          {{-- @if ($item->status == "delivered")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "pending")
          <td><span class="badge badge-warning">{{ $item->status }}</span></td>
          @endif
          

          @if ($item->status == "accepted")
          <td><span class="badge badge-info">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "shippedAwaitingDelivery")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif --}}

          <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">ِAhmed</div>
          </td>
        </tr>



        <tr>
          
          <td><a href="#">1</a></td>
          <td>100</td>
          <td>hossam@gmail.com</td>

          {{-- @if ($item->status == "cancelled") --}}
          <td><span class="badge badge-danger">ملغية</span></td>
          {{-- @endif --}}
         

          {{-- @if ($item->status == "delivered")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "pending")
          <td><span class="badge badge-warning">{{ $item->status }}</span></td>
          @endif
          

          @if ($item->status == "accepted")
          <td><span class="badge badge-info">{{ $item->status }}</span></td>
          @endif


          @if ($item->status == "shippedAwaitingDelivery")
          <td><span class="badge badge-success">{{ $item->status }}</span></td>
          @endif --}}

          <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">ِAhmed</div>
          </td>
        </tr>
        {{-- @endforeach --}}

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
              <a href="#" class="btn btn-sm btn-secondary float-right viwAllOrders">{{ trans('dash.dash.vaor') }}</a>
            </div>
            <!-- /.card-footer -->
          </div>


    </div>
  </div>
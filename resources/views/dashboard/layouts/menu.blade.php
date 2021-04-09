<div class="navbar-custom-menu" style="float:right !important">
    <ul class="nav navbar-nav">

      <!-- our messages of users / guest ... -->
      <li class="dropdown messages-menu" data-toggle="tooltip" data-original-title='الرسائل' data-placement="bottom">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-danger">{{ messages()[1] }}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header text-center" style="font-size:12px !important">

            @if (messages()[1]>0)
                لديك {{ messages()[1] }} رسالة غير مقروءة
            @else
                ليس لديك أي رسائل جديدة
            @endif

          </li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            @foreach(messages()[0] as $message)
                <li {{ $message->status==0 ?"style=background:#eee":''}}><!-- start message -->
                    <a href="{{ adminUrl('contact/'.$message->id.'/edit') }}">
                    <h4 style="margin-right:5px">
                        <label class="badge label-warning">{{$message->name}}</label>
                        <small><i class="fa fa-clock-o"></i> {{ date_str($message->created_at) }} </small>
                    </h4>
                    <p>{{ \Illuminate\Support\Str::limit($message->msg, 30, '...') }}</p>
                    </a>
                </li>
                <!-- end message -->
              @endforeach
            </ul>
          </li>
          <li class="footer"><a href="{{ adminUrl('contact') }}">تصفح جميع الرسائل</a></li>
        </ul>

        
      </li>

      <!-- change language -->
      <li class="user user-menu">
        <a href="{{ url('/') }}" data-toggle="tooltip" data-original-title='الموقع' data-placement="bottom">
          <i class="fa fa-globe"></i>
        </a>
      </li>
    
      {{-- logout user --}}
      <li class="dropdown user user-menu" data-toggle="tooltip" data-original-title='عضويتك' data-placement="bottom">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <img src="{{url('assets/img/avatar.png')}}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{url('assets/img/avatar.png')}}" class="img-circle" alt="User Image">

            <p>
              Admin
              <small>{{auth()->user()->created_at}}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="{{ adminUrl('logout') }}" class="btn btn-default btn-flat">تسجيل الخروج</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
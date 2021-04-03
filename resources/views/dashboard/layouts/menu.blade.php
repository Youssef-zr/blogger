<div class="navbar-custom-menu" style="float:right !important">
    <ul class="nav navbar-nav">

      <!-- our messages of users / guest ... -->
      <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          {{-- <span class="label label-danger">{{ messages()[1] }}</span> --}}
        </a>
        <ul class="dropdown-menu">
          <li class="header text-left" style="font-size:12px !important">

            {{-- @if (messages()[1]>0)
                لديك {{ messages()[1] }} رسالة غير مقروءة
            @else
                ليس لديك أي رسائل جديدة
            @endif --}}

          </li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            {{-- @foreach(messages()[0] as $message)
                <li><!-- start message -->
                    <a href="{{ route('contact.edit',['id'=>$message->id]) }}">
                    <h4>
                        {{$message->name}}
                        <small><i class="fa fa-clock-o"></i> {{ date_str($message->created_at) }} </small>
                    </h4>
                    <p>{{ str_limit($message->msg,30) }}</p>
                    </a>
                </li>
                <!-- end message -->
              @endforeach --}}
            </ul>
          </li>
          <li class="footer"><a href="{{ adminUrl('contact') }}">تصفح جميع الرسائل</a></li>
        </ul>
      </li>

      <!-- change language -->
      <li class="user user-menu">
        <a href="{{ url('/') }}">
          <i class="fa fa-globe"></i>
        </a>
      </li>
    </ul>
  </div>
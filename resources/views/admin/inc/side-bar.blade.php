<!-- Side-Nav-->
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="active"><a><i class="fa fa-dashboard"></i><span>Khối lớp</span></a></li>
      <li class="treeview"><a href=""><i class="fa fa-laptop"></i><span>Khối lớp 1</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          @foreach($lop as $l)
          @if($l->khoilop_id==1)
          <li><a href="" class="lop" id="{{$l->id}}-{{$l->ten}}"><i class="fa fa-circle-o"></i>{{$l->ten}}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      <li class="treeview"><a href=""><i class="fa fa-laptop"></i><span>Khối lớp 2</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          @foreach($lop as $l)
          @if($l->khoilop_id==2)
          <li><a href="" class="lop" id="{{$l->id}}-{{$l->ten}}"><i class="fa fa-circle-o"></i>{{$l->ten}}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      <li class="treeview"><a href=""><i class="fa fa-laptop"></i><span>Khối lớp 3</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          @foreach($lop as $l)
          @if($l->khoilop_id==3)
          <li><a href="" class="lop" id="{{$l->id}}-{{$l->ten}}"><i class="fa fa-circle-o"></i>{{$l->ten}}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      <li class="treeview"><a href=""><i class="fa fa-laptop"></i><span>Khối lớp 4</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          @foreach($lop as $l)
          @if($l->khoilop_id==4)
          <li><a href="" class="lop" id="{{$l->id}}-{{$l->ten}}"><i class="fa fa-circle-o"></i>{{$l->ten}}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      <li class="treeview"><a href=""><i class="fa fa-laptop"></i><span>Khối lớp 5</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          @foreach($lop as $l)
          @if($l->khoilop_id==5)
          <li><a href="" class="lop" id="{{$l->id}}-{{$l->ten}}"><i class="fa fa-circle-o"></i>{{$l->ten}}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
    </ul>
  </section>
</aside>
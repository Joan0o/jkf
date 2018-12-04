@php
    $colors = ['info',
     'success',
      'light', 'secondary', 'warning'];
@endphp

<style>
.chips {
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  padding: 10px 30px;
  margin: 20px 0 0 30%;
}

.chip {
  margin: 5px 0;
  border-radius: .75em;
  display: inline-block;
  font-size: 12px;
  line-height: 1em;
  padding: .55em .75em;
}

.chip--primary {
  background: #dedede;
  color: #000;
}

.chip--secondary {
  background: #4a4a4a;
  color: #fff;
}

.chip--alternative {
  background: #c6c6c6;
  color: #000;
}

.chip--alert {
  background: #fff6bf;
  color: #000;
}

.chip--danger {
  background: #dcaa26;
  color: #000;
}

.chip--warning {
  background: #d74c2b;
  color: #fff;
}

.chip--success {
  background: #45c550;
  color: #fff;
}

</style>

@if (count($collection) > 0)
   <div class="chips">
        @foreach ($collection as $item)
          <span class="badge badge-{{ $colors[rand(0,4)] }}">{{ $item->nombre }}</span>
        @endforeach
    </div> 
@endif

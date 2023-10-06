<h1>Danh sách tin tức</h1>

{{ $new_title }}<br>
{{ $new_content }} <br>
{! $new_auth !} <br>

{{ !empty($page_title)? $page_title : 'Khong co gi'}}

<hr>

@if(!empty($new_auth))
<p>Tên tác giả: {{$new_auth}}</p>
@else
<p>Không có gì</p>
@endif

@php
$number = 1;
$number++;
echo $number;

@endphp

@for ($i =1 ;$i<=10; $i++)
<p>{{$i}}</p>
@endfor
<hr>
@php
$i=0
@endphp
@while ($i<=5)
<p>{{$i}}</p> 
@php
$i++ 
@endphp
@endwhile 

@php
$data01 = [
    'Item01',
    'Item02',
    'Item03',
];
@endphp

@foreach ($data01 as $key=>$value)
   {{$key}} - {{$value}}<br>

@endforeach


@extends('Backend.master')
@section('content')
<h2>Information</h2>
<table >
    <tr>
      <th rowspan="4"><img src="{{asset('assets/images/categories/'.$product->image)}}" width="420px"></th>
      <th>Contact</th>

    </tr>
    <tr>
      <td></td>
      <td>{{ $product->id }}</td>

    </tr>
    <tr>
      <td></td>
      <td>{{ $product->name }}</td>
    </tr>
    <tr>
      <td></td>
      <td>{{ $product->price }}</td>
    </tr>
    <tr>
        <td></td>
        <td>{{ $product->color }}</td>
      </tr>
      <tr>
        <td></td>
        <td>{{ $product->quantity }}</td>
      </tr>
      <tr>
        <td></td>
        <td>{{ $product->description }}</td>
      </tr>
      <td class="">
      <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
  </td>
  </table>

@endsection




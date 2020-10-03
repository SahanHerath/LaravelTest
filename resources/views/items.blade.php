@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Items</div>
                <table class="table table hover table-bordered">
                       <thead>
                            <tr>
                                <th width="5"><center>Item No</center></th>
                                <th><center>Item Name</center></th>
                                <th><center>Item Type</center></th>
                                <th><center>Quantity</center></th>             
                                <th><center>Delete</center></th>
                                <th><center>Edit</center></th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($data as $key=>$value)
                            <tr>
                                <td style="color:black"><center>{{$key+1}}</center></td>
                                <td style="color:black"><center>{{$value->name}}</center></td>
                                <td style="color:black"><center>{{$value->item_type}}</center></td>
                                <td style="color:black"><center>{{$value->quantity}}</center></td>
                                <td style="color:black"><center><a href="{{URL('/deleteItem'.$value->id)}}"><center><button type="button" class="btn btn-danger">Delete</button></a></center></td>
                                <td style="color:black"><center><a href="{{URL('/editItem'.$value->id)}}"><center><button type="button" class="btn btn-info">Edit</button></a></center></td>
                                
                            </tr>
                            
                           @endforeach
                           
                       </tbody>
                       </table>
            </div>
        </div>
    </div>
</div>
@endsection

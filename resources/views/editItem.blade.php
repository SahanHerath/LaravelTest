@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Item</div>
                @foreach($data as $value)
                <form class="form-horizontal" method="POST" action="{{URL('/updateItem',$value->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$value->name}}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="item_type" class="col-md-4 control-label">Item Type</label>
                            
                            <div class="col-md-6">
                                <select id="item_type" class="form-control" name="item_type">
                                    <option value="Fruit" {{($value->item_type == "Fruit")? 'selected':''}}>Fruit</option>
                                    <option value="Sweets" {{($value->item_type == "Sweets")? 'selected':''}}>Sweets</option>
                                    <option value="Vegitables" {{($value->item_type == "Vegitables")? 'selected':''}}>Vegitables</option>
                                    <option value="Seeds" {{($value->item_type == "Seeds")? 'selected':''}}>Seeds</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_of_boarders') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" min="0" class="form-control" name="quantity" value="{{$value->quantity}}">

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
    
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

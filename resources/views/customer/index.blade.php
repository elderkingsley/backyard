@extends('central.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div> 

                <div class="card">
                    <div class="card-header">
                        <h4>Customers
                            <a href="{{ url('customer/create') }}" class="btn btn-primary float-end">Add Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->customer_phone }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit', $customer->customer_id) }}" class="btn btn-success">Edit</a>
                                                <a href="{{ route('customer.show', $customer->customer_id) }}" class="btn btn-info">View</a>
                                               <form action="{{ route('customer.destroy', $customer->customer_id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                               </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

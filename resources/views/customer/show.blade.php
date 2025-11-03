@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Customer Information
                            <a href="{{ url('customer') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <p>
                                    {{ $customer->customer_name}}
                                </p>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="" required>
                                @error('customer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="customer_phone" class="form-label">Phone Number</label>
                                <p>
                                    {{ $customer->customer_phone }}
                                </p>
                                <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="" required>
                                @error('customer_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

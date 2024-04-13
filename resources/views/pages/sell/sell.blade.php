@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <div style="margin-bottom: 10px;">
                    <h2 style="display: inline-block;">Sell Your Item</h2>
                    <a href="{{ route('sell.add') }}" class="btn btn-success" style="float: right;">Add Item</a>
                </div>


                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Price (Rs)</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->CategoryName->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->description }}</td>
                                <td style="display: flex;">
                                    <a href="{{ route('sell.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('sell.delete', $item->id) }}" method="POST"
                                        style="margin-right: 5px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $items->links() }}

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .assignmt-img {
            width: 365px !important;
            height: 264px !important;
        }

        @media (max-width: 768px) {

            .assignmt-img {
                width: unset !important;
            }

        }

        .not-found {
            text-align: center;
        }
    </style>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <form name="createProduct" id="createProduct" action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <h1>Add New Product</h1>
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input placeholder="Name"="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price:</label>
                                <input placeholder="99.90" type="number" class="form-control" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="detail">Detail:</label>
                                <textarea placeholder="Detail" class="form-control" id="detail" name="detail" rows="4" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="publish_status">Publish Status:</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publish_status" id="publish_yes" value="Yes" required checked>
                                        <label class="form-check-label" for="publish_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publish_status" id="publish_no" value="No" required>
                                        <label class="form-check-label" for="publish_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="d-flex justify-content-center align-items-center btn btn-primary">Submit</button>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                @if(session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-start align-items-center">Laravel</div>
                                <div class="col-6 d-flex justify-content-end align-items-center"><a href="{{ route('product.create') }}" class="btn btn-success">Create New Product</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Price(RM)</th>
                                            <th>Details</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12"><a href="{{ route('product.show') }}" class="btn theme-btn theme-btn-sm theme-btn-white">Show<i class="la la-arrow-right icon ml-1"></i></a></div>
                        <div class="col-12"><a href="{{ route('product.show') }}" class="btn theme-btn theme-btn-sm theme-btn-white">Edit<i class="la la-arrow-right icon ml-1"></i></a></div>
                        <div class="col-12"><a href="{{ route('product.show') }}" class="btn theme-btn theme-btn-sm theme-btn-white">Delete<i class="la la-arrow-right icon ml-1"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
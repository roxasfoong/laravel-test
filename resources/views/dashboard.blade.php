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
                                <div class="col-6 d-flex justify-content-end align-items-center"><a href="{{ route('product.create.page') }}" class="btn btn-success">Create New Product</a></div>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        @foreach ($productList as $key=> $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->price}}
                            </td>
                            <td>
                            {{$item->detail}}
                            </td>
                            <td>
                                {{$item->publish}}
                            </td>
                            <td>
                            <a href ="{{route('product.show',$item->id)}}" class="btn btn-info" title="Edit">Show<i class="lni lni-eraser"></i></a> 
                                <a href ="{{route('product.edit',$item->id)}}" class="btn btn-primary" title="Learning List">Edit<i class="lni lni-list"></i></a> 
                                <a href ="{{route('product.delete',$item->id)}}" class="btn btn-danger" id="Delete">Delete <i class="lni lni-trash"></i></a> 
                            </td>
                            
                        </tr>
                        @endforeach 
                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
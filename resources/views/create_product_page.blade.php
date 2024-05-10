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
                        <form action="#" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <h1>Add New Product</h1>
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-primary">Back</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail:</label>
                                <textarea class="form-control" id="detail" name="detail" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="publish_status">Publish Status:</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publish_status" id="publish_yes" value="yes" required>
                                        <label class="form-check-label" for="publish_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publish_status" id="publish_no" value="no" required>
                                        <label class="form-check-label" for="publish_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="d-flex justify-content-center align-items-center btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
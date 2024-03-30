<!-- resources/views/dashboard.blade.php -->

@extends('template/templateMain')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Latest posts</h5>
        </div>

        <div class="card-body pb-0">
            <div class="row">
                @foreach($recentPosts as $post)
                    <div class="col-xl-6">
                        <div class="d-sm-flex align-items-sm-start mb-3">
                            <a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
                                <img src="{{ asset('storage/images/' . $post->image) }}" class="flex-shrink-0 rounded" height="100" alt="">
                               
                                <span class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">{{ $post->created_at }}</span>
                            </a>

                            <div class="flex-fill">
                                <h6 class="mb-1"><a href="#">{{ $post->title }}</a></h6>
                                {{ $post->content }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
    <div class="card">
    <div class="card-header">
        <h5 class="mb-0">Author List</h5>
    </div>
    <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="datatable-scroll-wrap">
            
            <table class="table datatable-button-html5-tab table-striped table-hover dataTable no-footer" id="DataTables_Table_3" aria-describedby="DataTables_Table_3_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <div class="datatable-footer pagination-sm">
        <div class="dataTables_info  pagination-sm" id="DataTables_Table_3_info" role="status" aria-live="polite">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</div>
        <div class=" mt-4 pagination-sm dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
        </div>

    </div>
</div>

    

@endsection

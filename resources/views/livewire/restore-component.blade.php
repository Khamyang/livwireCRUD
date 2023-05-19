<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>Restore</strong></h5>
                        <button wire:click="resAll()" class="btn btn-success btn-sm" style="float: right;">Restore All</button>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Action</th>
                                    <th>Student id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $no=1;
                                @endphp
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-primary" wire:click="trashed({{ $student->id }})">Restore</button>
                                                {{-- <a class="btn btn-sm btn-primary" href="{{route('st-restore.res',['id' => $student->id])}}">Restore</a> --}}
                                                <button class="btn btn-sm btn-danger" wire:click="foredel({{ $student->id }})">Delete</button>
                                            </td>
                                            <td>{{ $student->student_id}}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center;"><small>No Student Found</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('restore',function(e){
            Swal.fire(e.detail);
        });
        window.addEventListener('restore-all',function(e){
            Swal.fire(e.detail);
        });
    </script>
@endpush


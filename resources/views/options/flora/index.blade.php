<x-admin-master>
    @section('content')
    @if(session('delMsg'))
    <div class="alert alert-danger">
        {{session('delMsg')}}
    </div>
    @elseif(session('updateMsg'))
    <div class="alert alert-warning">
    {{session('updateMsg')}}
    </div>
    @endif

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Crop id</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Note</th>

                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Crop id</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Note</th>

                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  @foreach($floras as $flora)
                  <tbody>
                    <tr>
                        <td>{{$flora->id}}</td>
                        <td>{{$flora->name}}</td>
                        <td>{{$flora->number}}</td>
                        <td>{{Str::Limit($flora->note,50,'...')}}</td>
                        <td>
                          
                            <button class="btn btn-success">
                                <a href="{{route('flora.edit',$flora->id)}}">update</a>
                            </button>
                            
                        </td>
                        <td>
                            <form action="{{route('flora.destroy', $flora->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">delete</button>
                            </form>
                        </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>

        </div>

    @endsection
</x-admin-master>
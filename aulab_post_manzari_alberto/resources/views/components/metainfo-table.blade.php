<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">Q.tà articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{$metaInfo->id}}</th>
                <td>{{$metaInfos->name}}</td>
                <td>{{count($metaInfos->articles)}}</td>
                @if ($metaType == 'tags')
                    <td>
                        <form action="{{route('admin.editTag', ['tag' => $metaInfos])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo come tag" class="form-control w-50 d-inline" >
                            <button type="submit" class="btn btn-secondary">Modifica</button>
                        </form>
                    </td>
                    <td>
                        <form action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                    @endif
            </tr>
        @endforeach
    </tbody>
</table>
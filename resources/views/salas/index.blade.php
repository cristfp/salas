
 @extends('layout')

@section('cabecalho')
Salas
@endsection

@section('conteudo')
    <a href="/salas/adicionar" class="btn btn-dark mb-2"> Adicionar Sala</a>
        <ul class="list-group">
        @foreach ($salas as $sala)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $sala->nome }}
        &nbsp &nbsp
        {{ $sala->created_at }}
        <form method="post" action="/salas/{{$sala->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $sala->nome )}}?')">
                    @csrf
                    @method('DELETE')
            <button class="btn btn-danger">Excluir</button>
        </form>
        </li>
        @endforeach
        
        </ul>
        
@endsection
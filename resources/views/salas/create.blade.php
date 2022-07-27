
 @extends('layout')

@section('cabecalho')
Adicionar Salas
@endsection

@section('conteudo')
        <label for="nome" class="">Nome da sala</label>
        <form method="post">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="nome">

                </div>
                <button class="btn btn-primary">Adicionar</button>
                </form>
@endsection

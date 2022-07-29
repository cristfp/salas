
 @extends('layout')

@section('cabecalho')
Salas
@endsection

@section('conteudo')
    <a href="/salas/adicionar" class="btn btn-dark mb-2"> Adicionar Sala</a>
        <ul class="list-group">
        @foreach($salas as $sala)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-sala-{{ $sala->id }}">{{ $sala->nome }}</span>
        {{ $sala->created_at }}
        <div class="input-group w-50" hidden id="input-nome-sala-{{ $sala->id }}">
            <input type="text" class="form-control" value="{{ $sala->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSala({{ $sala->id }})">
                    OK
                </button>
                @csrf
            </div>
        </div>

  
        <button class="btn btn-primary btn-sm " onclick="toggleInput({{ $sala->id }})">
            Editar
        </button>
      
        <form method="post" action="/salas/{{ $sala->id }}"
              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($sala->nome) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm mt-2 ">
               Excluir
            </button>
        </form>
   
</li>
@endforeach
        
   
@endsection
<script>
   function toggleInput(salaId) {
    const nomeSalaEl = document.getElementById(`nome-sala-${salaId}`);
    const inputSalaEl = document.getElementById(`input-nome-sala-${salaId}`);
    if (nomeSalaEl.hasAttribute('hidden')) {
        nomeSalaEl.removeAttribute('hidden');
        inputSalaEl.hidden = true;
    } else {
        inputSalaEl.removeAttribute('hidden');
        nomeSalaEl.hidden = true;
    }
}
function editarSala(salaId) {
    let formData = new FormData();
    const nome = document
        .querySelector(`#input-nome-sala-${salaId} > input`)
        .value;
    const token = document
        .querySelector(`input[name="_token"]`)
        .value;
    formData.append('nome', nome);
    formData.append('_token', token);
    const url = `/salas/${salaId}/editaNome`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(salaId);
        document.getElementById(`nome-sala-${salaId}`).textContent = nome;
    });
} 
</script> 
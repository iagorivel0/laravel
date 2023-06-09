@extends('site.layout')

@section('title', 'Carrinho')

@section('conteudo')
  <div class="row container">

    @if ($message = Session::get('sucesso'))
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{ $message }}</p>
        </div>
      </div>
    @endif
    
    @if ($message = Session::get('aviso'))
      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">Aviso</span>
          <p>{{ $message }}</p>
        </div>
      </div>
    @endif

    @if ($itens->count() == 0)

    <div class="card orange">
      <div class="card-content white-text">
        <span class="card-title">Seu carrinho está vazio!</span>
        <p>Aproveite nossas promoções!</p>
      </div>
    </div>

    @else
      
      <h5>Seu carrinho possui: {{ $itens->count() }} produtos.</h5>

      <table class="stripped">
        <thead>
          <tr>
            <th></th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($itens as $item)
            <tr>
              <td><img src="{{ $item->attributes->image }}" alt="image" width="70" class="responsive-img circle"></td>
              <td>{{ $item->name }}</td>
              <td>{{ number_format($item->price, 2, ',', '.') }}</td>

              {{-- botão de atualizar --}}
              <form action="{{ route('site.atualizaCarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
              <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="quantity" min="1" value="{{ $item->quantity }}"></td>
              <td>
                <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                </form>

                {{-- botão de remover --}}
                <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value="{{ $item->id }}" name="id">
                  <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">R$ {{ number_format(\Cart::getTotal(), '2', ',', '.')  }}</span>
          <p>Pague em 12x sem juros!</p>
        </div>
      </div>
    @endif


    <div class="row container center">
      <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue"> Continuar Comprando <i class="material-icons right">arrow_back</i></a>
      <a href="{{ route('site.limparCarrinho') }}" class="btn waves-effect waves-light blue"> Limpar Carrinho <i class="material-icons right">clear</i></a>
      <button class="btn waves-effect waves-light green"> Finalizar Pedido <i class="material-icons right">check</i></button>
    </div>

  </div>

@endsection

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrador ImobPrime</title>
  <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
  <header class="header">
    <div class="header__logo">Young<span class="header__logo--highlight">Imobiliaria</span></div>
    <button class="header__mobile-btn" aria-label="Abrir menu">
      <span></span><span></span><span></span>
    </button>
    <nav class="nav">
      <ul class="nav__list">
        <li>
          <!-- Formulário escondido para logout -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
          </form>
          <!-- Link que dispara o logout -->
          <a href="#" class="nav__link nav__link--active" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
          </a>
        </li>
      </ul>
    </nav>

  </header>
  <main class="main-content">
    <section id="home" class="section section--active">
      <div class="controls">
        <button type="button" class="btn btn--primary" id="cadastrarBtn">Cadastrar</button>
        <div class="controls__search">
          <input type="text" class="controls__search-input" placeholder="Pesquisar...">
          <button type="button" class="btn btn--secondary">Pesquisar</button>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            {{-- <th>ID</th> --}} {{-- Oculta o cabeçalho do ID --}}
            <th>ID</th>
            <th>Nome</th>
            <th>Serviço</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @if (!empty($data) && count($data) > 0)
            @foreach ($data as $item)
              <tr data-id="{{ $item['id'] }}">
                {{-- <td style="display: none;">{{ $item['id'] }}</td>  --}} {{-- Se quiser manter visível no HTML mas escondido --}}
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['nome'] }}</td>
                <td>{{ $item['tipo'] }}</td>
                <td>{{ $item['valor'] }}</td>
                <td>
                <form action="{{ route('servicos.destroy', $item['id']) }}" method="POST" 
                      onsubmit="return confirm('Deseja realmente eliminar este serviço?');">
                  @csrf
                  {{-- Se o @method não estiver funcionando, faça assim: --}}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn-eliminar" title="Eliminar">🗑️</button>
                </form>
                </td>
              </tr>
            @endforeach
          @else
              <tr>
                <td colspan="5">Nenhum serviço encontrado.</td>
              </tr>
          @endif
        </tbody>
      </table>


    </section>
  </main>
  <!-- Modal de Cadastro -->
  <div class="modal" aria-hidden="true" id="formModal">
    <div class="modal__overlay"></div>
    <div class="modal__content" role="dialog" aria-modal="true" aria-labelledby="formTitle">
      <button class="modal__close" aria-label="Fechar">&times;</button>
      <h2 id="formTitle" class="modal__title">Cadastrar Serviços</h2>
      
      <form class="form" action="{{ route('createService.post') }}" method="POST" enctype="multipart/form-data">

        @csrf 
      <div class="form__group">
          <input type="text" name="nome" placeholder="Nome do produto" required>
          <select name="tipo" id="tipoServico">
            <option disabled selected>Tipo de Serviço</option>
            <option value="aluguel">Aluguel</option>
            <option value="compra">Compra</option>
            <option value="terreno">Terreno</option>
          </select>
        </div>
        <div class="form__group form__group--rooms">
          <input type="number" name="quartos" placeholder="Quantidade de Quartos" required>
          <input type="number" name="banheiros" placeholder="Quantidade de Banheiros" required>
        </div>
        <!-- Campo Zona exibido apenas para Terreno -->
        <div class="form__group form__group--zone" style="display: none;">
          <input type="text" name="zona" placeholder="Zona do terreno">
        </div>
        <div class="form__group">
          <input type="number" step="0.01" name="area" placeholder="Metros por quadrado" required>
          <input type="number" step="0.01" name="valor" placeholder="Valor do imóvel" required>
        </div>
        <div class="form__group">
          <textarea name="descricao" rows="3" placeholder="Descrição do Serviço" required></textarea>
        </div>
        <!-- Campo Foto -->
        <div class="form__group form__group--photo">
          <label for="foto" class="form__label">Foto do serviço</label>
          <input 
            type="file" 
            id="foto" 
            name="foto" 
            accept="image/*" 
            class="form__input-file" 
          />
          <img 
            id="previewPhoto" 
            class="form__preview" 
            alt="Pré‑visualização da foto" 
            style="display:none; max-width:100%; margin-top:8px;" 
          />
        </div>
        <div class="form__actions">
          <button type="submit" class="btn btn--primary">Confirmar</button>
        </div>
      </form>
    </div>
  </div>

      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Exibir erros --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <script src="/js/admin.js"></script>
</body>
</html>
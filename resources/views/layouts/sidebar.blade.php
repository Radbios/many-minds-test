<sidebar>
    <ul id="topside">
        <li class="item-nav {{request()->route()->getName() == "dashboard" ? "active" : ""}}">
            <a href="{{Route("dashboard")}}">
                <img src="{{asset("assets/icon/home.svg")}}" alt="">
                <div class="sidebar-text">
                    Início
                </div>
            </a>
        </li>
        @can('isAdmin', auth()->user())
            <li class="item-nav {{request()->route()->getName() == "product.index" ? "active" : ""}}">
                <a href="{{route("product.index")}}">
                    <img src="{{asset("assets/icon/product.svg")}}" alt="">
                    <div class="sidebar-text">
                        Produtos
                    </div>
                </a>
            </li>
            <li class="item-nav {{request()->route()->getName() == "supplier.index" ? "active" : ""}}">
                <a href="{{route("supplier.index")}}">
                    <img src="{{asset("assets/icon/suppliers.svg")}}" alt="">
                    <div class="sidebar-text">
                        Fornecedores
                    </div>
                </a>
            </li>
        @endcan
        <li class="item-nav {{request()->route()->getName() == "shop.index" ? "active" : ""}}">
            <a href="{{route("shop.index")}}">
                <img src="{{asset("assets/icon/shop.svg")}}" alt="">
                <div class="sidebar-text">
                    Loja
                </div>
            </a>
        </li>
        <li class="item-nav  {{request()->route()->getName() == "cart.index" ? "active" : ""}}">
            <a href="{{route("cart.index")}}">
                <img src="{{asset("assets/icon/cart.svg")}}" alt="">
                <div class="sidebar-text">
                    Carrinho
                </div>
            </a>
        </li>
        <li class="item-nav  {{request()->route()->getName() == "order.index" ? "active" : ""}}">
            <a href="{{route("order.index")}}">
                <img src="{{asset("assets/icon/list.svg")}}" alt="">
                <div class="sidebar-text">
                    Pedidos
                </div>
            </a>
        </li>
    </ul>
    <ul id="botside">
        {{-- <li class="item-nav">
            <a href="">
                <img src="{{asset("assets/icon/users.svg")}}" alt="">
                <div class="sidebar-text">
                    Usuários
                </div>
            </a>
        </li> --}}
        <li class="item-nav">
            <form action="{{route("logout")}}" method="POST">
                @csrf
                @method("POST")
                <img src="{{asset("assets/icon/logout.svg")}}" alt="">
                <button class="sidebar-text" type="submit">
                    Sair
                </button>
            </form>
        </li>
    </ul>
</sidebar>

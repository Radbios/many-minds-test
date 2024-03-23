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
        <li class="item-nav {{request()->route()->getName() == "product.index" ? "active" : ""}}">
            <a href="{{route("product.index")}}">
                <img src="{{asset("assets/icon/product.svg")}}" alt="">
                <div class="sidebar-text">
                    Produtos
                </div>
            </a>
        </li>
        <li class="item-nav">
            <a href="">
                <img src="{{asset("assets/icon/list.svg")}}" alt="">
                <div class="sidebar-text">
                    Pedidos
                </div>
            </a>
        </li>
    </ul>
    <ul id="botside">
        <li class="item-nav">
            <a href="">
                <img src="{{asset("assets/icon/users.svg")}}" alt="">
                <div class="sidebar-text">
                    Usuários
                </div>
            </a>
        </li>
        <li class="item-nav">
            <a href="">
                <img src="{{asset("assets/icon/logs.svg")}}" alt="">
                <div class="sidebar-text">
                    Logs
                </div>
            </a>
        </li>
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

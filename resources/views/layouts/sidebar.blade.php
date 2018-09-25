@if(isset($company))
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('company', $company) }}">{{ $company->name }}</a></li>
                    <li><a href="{{ route('members',$company) }}">Members</a></li>
                    <li><a href="{{ route('position.index',$company) }}">Positions</a></li>
                    <li><a href="{{ route('token.index',$company) }}">Tokens</a></li>
                    <li><a href="{{ route('product.index',$company) }}">Store</a></li>
                    <li><a href="{{ route('provider.index',$company) }}">Provider</a></li>
                    <li><a href="{{ route('client.index',$company) }}">Client</a></li>
                </ul>
            </div>
        </div>
    </div>
@endif

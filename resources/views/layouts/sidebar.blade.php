@if(isset($myCompany))
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="{{ route('user.index') }}">members</a></li>
                    <li><a href="{{ route('token.index',$myCompany) }}">tokens</a></li>
                </ul>
            </div>
        </div>
    </div>
@endif

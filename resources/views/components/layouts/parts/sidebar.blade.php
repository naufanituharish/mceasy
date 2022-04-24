<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="fas fa-home fa-fw"></i>
                    <span>Home</span> 
                </a>
            </li>
            <li class="{{ request()->routeIs('employees') ? 'active' : '' }}">
                <a href="{{ route('employees') }}">
                    <i class="fas fa-address-card"></i>
                    <span>Employees</span> 
                </a>
            </li>
        </ul>
    </div>
</div>
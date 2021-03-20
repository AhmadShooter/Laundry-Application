<div id="sidebar-menu">
    <?php use App\User;
            $user = User::where('id',Auth::User()->id)->first();
                    ?>

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{route('admin.Dashboard')}}">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Manajemen</li>
                            @if($user->hasAnyRole(['admin','kasir']))
                            <li>
                                <a href="{{route('admin.outlet.index')}}">
                                    <i class="fas fa-store-alt"></i>
                                    <span> Outlet </span>
                                </a>
                            </li>
                            @endif
                            @if($user->hasAnyRole(['admin']))
                            <li>
                                <a href="{{route('admin.member.index')}}">
                                    <i class="mdi mdi-wallet-membership"></i>
                                    <span> Member </span>
                                </a>
                            </li>
                            @endif
                            @if($user->hasAnyRole(['admin']))
                            <li>
                                <a href="{{route('admin.user.index')}}">
                                    <i class="fe-user"></i>
                                    <span> User </span>
                                </a>
                            </li>
                            @endif
                            @if($user->hasAnyRole(['admin','kasir']))
                            <li>
                                <a href="{{route('admin.paket.index')}}">
                                    <i class="mdi mdi-package-variant-closed"></i>
                                    <span> Paket </span>
                                </a>
                            </li>
                            @endif
                            @if($user->hasAnyRole(['admin','kasir','owner']))
                            <li>
                                <a href="{{route('admin.transaksi.index')}}">
                                    <i class="dripicons-cart"></i>
                                    <span> Transaksi </span>
                                </a>
                            </li>
                            @endif
                            @if($user->hasAnyRole(['admin','owner']))
                            <li>
                                <a href="{{route('admin.laporan.index')}}">
                                    <i class="mdi mdi-book-outline"></i>
                                    <span> Laporan </span>
                                </a>
                            </li>
                            @endif
                        </ul>

                    </div>
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i
                        class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>
            {{-- @can('management_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') || request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') || request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') || request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Management Access">Management Access</span></a>
                <ul class="menu-content">
                    @can('permission_access')
                        <li
                            class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.permission.index') }}">
                                <i></i><span>Permission</span>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="{{ request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.role.index') }}">
                                <i></i><span>Role</span>
                            </a>
                        </li>
                    @endcan
                    @can('type_user_access')
                        <li
                            class="{{ request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.type_user.index') }}">
                                <i></i><span>Type User</span>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.user.index') }}">
                                <i></i><span>User</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('master_data_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/blood_supply') || request()->is('backsite/blood_supply/*') || request()->is('backsite/*/blood_supply') || request()->is('backsite/*/blood_supply/*') || request()->is('backsite/doctor') || request()->is('backsite/doctor/*') || request()->is('backsite/*/doctor') || request()->is('backsite/*/doctor/*') || request()->is('backsite/donor') || request()->is('backsite/donor/*') || request()->is('backsite/*/donor') || request()->is('backsite/*/donor/*') || request()->is('backsite/officer') || request()->is('backsite/officer/*') || request()->is('backsite/*/officer') || request()->is('backsite/*/officer/*') || request()->is('backsite/patient') || request()->is('backsite/patient/*') || request()->is('backsite/*/patient') || request()->is('backsite/*/patient/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                        class="menu-title" data-i18n="Master Data">Master Data</span></a>
                <ul class="menu-content">

                    @can('blood_supply_access')
                        <li
                            class="{{ request()->is('backsite/blood_supply') || request()->is('backsite/blood_supply/*') || request()->is('backsite/*/blood_supply') || request()->is('backsite/*/blood_supply/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_supply.index') }}">
                                <i></i><span>Blood Supply</span>
                            </a>
                        </li>
                    @endcan

                    @can('doctor_access')
                        <li
                            class="{{ request()->is('backsite/doctor') || request()->is('backsite/doctor/*') || request()->is('backsite/*/doctor') || request()->is('backsite/*/doctor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.doctor.index') }}">
                                <i></i><span>Doctor</span>
                            </a>
                        </li>
                    @endcan

                    @can('donor_access')
                        <li
                            class="{{ request()->is('backsite/donor') || request()->is('backsite/donor/*') || request()->is('backsite/*/donor') || request()->is('backsite/*/donor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.donor.index') }}">
                                <i></i><span>Donor</span>
                            </a>
                        </li>
                    @endcan

                    @can('officer_access')
                        <li
                            class="{{ request()->is('backsite/officer') || request()->is('backsite/officer/*') || request()->is('backsite/*/officer') || request()->is('backsite/*/officer/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.officer.index') }}">
                                <i></i><span>Officer</span>
                            </a>
                        </li>
                    @endcan

                    @can('patient_access')
                        <li
                            class="{{ request()->is('backsite/patient') || request()->is('backsite/patient/*') || request()->is('backsite/*/patient') || request()->is('backsite/*/patient/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.patient.index') }}">
                                <i></i><span>Patient</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('operational_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/aftap') || request()->is('backsite/aftap/*') || request()->is('backsite/*/aftap') || request()->is('backsite/*/aftap/*') || request()->is('backsite/blood_donor') || request()->is('backsite/blood_donor/*') || request()->is('backsite/*/blood_donor') || request()->is('backsite/*/blood_donor/*') || request()->is('backsite/blood_request') || request()->is('backsite/blood_request/*') || request()->is('backsite/*/blood_request') || request()->is('backsite/*/blood_request/*') || request()->is('backsite/crossmatch') || request()->is('backsite/crossmatch/*') || request()->is('backsite/*/crossmatch') || request()->is('backsite/*/crossmatch/*') || request()->is('backsite/screening') || request()->is('backsite/screening/*') || request()->is('backsite/*/screening') || request()->is('backsite/*/screening/*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span
                        class="menu-title" data-i18n="Operational">Operational</span></a>
                <ul class="menu-content">

                    @can('aftap_access')
                        <li
                            class="{{ request()->is('backsite/aftap') || request()->is('backsite/aftap/*') || request()->is('backsite/*/aftap') || request()->is('backsite/*/aftap/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.aftap.index') }}">
                                <i></i><span>Aftap</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_donor_access')
                        <li
                            class="{{ request()->is('backsite/blood_donor') || request()->is('backsite/blood_donor/*') || request()->is('backsite/*/blood_donor') || request()->is('backsite/*/blood_donor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_donor.index') }}">
                                <i></i><span>Blood Donor</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_request_access')
                        <li
                            class="{{ request()->is('backsite/blood_request') || request()->is('backsite/blood_request/*') || request()->is('backsite/*/blood_request') || request()->is('backsite/*/blood_request/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_request.index') }}">
                                <i></i><span>Blood Request</span>
                            </a>
                        </li>
                    @endcan

                    @can('crossmatch_access')
                        <li
                            class="{{ request()->is('backsite/crossmatch') || request()->is('backsite/crossmatch/*') || request()->is('backsite/*/crossmatch') || request()->is('backsite/*/crossmatch/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.crossmatch.index') }}">
                                <i></i><span>Crossmatch</span>
                            </a>
                        </li>
                    @endcan

                    @can('screening_access')
                        <li
                            class="{{ request()->is('backsite/screening') || request()->is('backsite/screening/*') || request()->is('backsite/*/screening') || request()->is('backsite/*/screening/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.screening.index') }}">
                                <i></i><span>Screening</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
